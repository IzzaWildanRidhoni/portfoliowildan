<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialMediaResource\Pages;
use App\Models\SocialMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SocialMediaResource extends Resource
{
    protected static ?string $model = SocialMedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-share';

    protected static ?string $navigationLabel = 'Social Media';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Social Media')
                    ->schema([
                        Forms\Components\Select::make('platform')
                            ->label('Platform')
                            ->options([
                                'WhatsApp' => 'WhatsApp',
                                'LinkedIn' => 'LinkedIn',
                                'Instagram' => 'Instagram',
                                'Facebook' => 'Facebook',
                                'Twitter' => 'Twitter',
                                'GitHub' => 'GitHub',
                                'Email' => 'Email',
                                'Website' => 'Website',
                                'YouTube' => 'YouTube',
                                'TikTok' => 'TikTok',
                            ])
                            ->required()
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                $icons = [
                                    'WhatsApp' => 'bi bi-whatsapp',
                                    'LinkedIn' => 'bi bi-linkedin',
                                    'Instagram' => 'bi bi-instagram',
                                    'Facebook' => 'bi bi-facebook',
                                    'Twitter' => 'bi bi-twitter',
                                    'GitHub' => 'bi bi-github',
                                    'Email' => 'bi bi-envelope',
                                    'Website' => 'bi bi-globe',
                                    'YouTube' => 'bi bi-youtube',
                                    'TikTok' => 'bi bi-tiktok',
                                ];
                                $set('icon', $icons[$state] ?? 'bi bi-link');
                            }),

                        Forms\Components\TextInput::make('label')
                            ->label('Label')
                            ->placeholder('Contoh: WhatsApp, My LinkedIn, Official Website')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('value')
                            ->label('Value')
                            ->required()
                            ->placeholder('Contoh: +6285643301453, username, email@example.com')
                            ->helperText(fn($get) => match ($get('platform')) {
                                'WhatsApp' => 'Format: +628xxxxxxxxxx',
                                'LinkedIn' => 'Username atau URL lengkap',
                                'Instagram' => '@username atau URL lengkap',
                                'Email' => 'email@example.com',
                                'Website' => 'example.com atau https://example.com',
                                default => 'Masukkan username atau URL'
                            })
                            ->maxLength(255),

                        Forms\Components\TextInput::make('icon')
                            ->label('Icon Class')
                            ->placeholder('bi bi-whatsapp')
                            ->helperText('Bootstrap Icons class (otomatis terisi)')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->helperText('Semakin kecil angka, semakin atas urutannya'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->helperText('Tampilkan di website'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('platform')
                    ->label('Platform')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('label')
                    ->label('Label')
                    ->searchable()
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->searchable()
                    ->limit(30)
                    ->copyable()
                    ->copyMessage('Copied!')
                    ->copyMessageDuration(1500),

                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->action(function (SocialMedia $record) {
                        $record->is_active = !$record->is_active;
                        $record->save();
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('platform')
                    ->label('Platform')
                    ->options([
                        'WhatsApp' => 'WhatsApp',
                        'LinkedIn' => 'LinkedIn',
                        'Instagram' => 'Instagram',
                        'Email' => 'Email',
                        'Website' => 'Website',
                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialMedia::route('/'),
            'create' => Pages\CreateSocialMedia::route('/create'),
            'edit' => Pages\EditSocialMedia::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_active', true)->count();
    }
}
