<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Portfolio';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Proyek')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Proyek')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->disabled()
                            ->dehydrated(),

                            Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Web Development' => 'Web Development',
                                'Mobile App' => 'Mobile App',
                                'UI/UX Design' => 'UI/UX Design',
                                'Branding' => 'Branding',
                                'E-Commerce' => 'E-Commerce',
                                'CMS Development' => 'CMS Development',
                            ])
                            ->searchable()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Kategori Baru')
                                    ->required()
                                    ->unique(
                                        table: 'portfolios',
                                        column: 'category',
                                        ignoreRecord: true // supaya saat edit tidak error
                                    ),
                            ])
                            ->createOptionUsing(function (array $data) {
                                return $data['name'];
                            }),
                        

                        Forms\Components\TextInput::make('client')
                            ->label('Nama Klien')
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('project_date')
                            ->label('Tanggal Proyek')
                            ->required()
                            ->default(now()),

                        Forms\Components\TextInput::make('project_url')
                            ->label('URL Proyek')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://example.com'),
                    ])->columns(2),

                Forms\Components\Section::make('Deskripsi & Detail')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\TagsInput::make('technologies')
                            ->label('Teknologi yang Digunakan')
                            ->placeholder('Contoh: Laravel, React, Tailwind')
                            ->suggestions([
                                'Laravel',
                                'PHP',
                                'React',
                                'Vue.js',
                                'Next.js',
                                'Tailwind CSS',
                                'Bootstrap',
                                'MySQL',
                                'PostgreSQL',
                                'MongoDB',
                                'JavaScript',
                                'TypeScript',
                            ])
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Utama')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('portfolio-images')
                            ->visibility('public')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('gallery')
                            ->label('Galeri Gambar')
                            ->image()
                            ->multiple()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('portfolio-gallery')
                            ->visibility('public')
                            ->maxFiles(10)
                            ->reorderable()
                            ->columnSpanFull()
                    ]),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Tampilkan di Featured')
                            ->default(false),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->circular(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('client')
                    ->label('Klien')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('project_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->action(function (Portfolio $record) {
                        $record->is_published = !$record->is_published;
                        $record->save();
                    })
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'Web Development' => 'Web Development',
                        'Mobile App' => 'Mobile App',
                        'UI/UX Design' => 'UI/UX Design',
                        'Branding' => 'Branding',
                        'E-Commerce' => 'E-Commerce',
                        'CMS Development' => 'CMS Development',
                    ]),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),

                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}