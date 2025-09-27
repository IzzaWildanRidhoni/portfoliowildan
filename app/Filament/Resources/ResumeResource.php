<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResumeResource\Pages;
use App\Models\Resume;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ResumeResource extends Resource
{
    protected static ?string $model = Resume::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'CV/Resume';

    protected static ?string $modelLabel = 'CV/Resume';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Resume')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('👤 Personal Info')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Forms\Components\FileUpload::make('profile_photo')
                                    ->label('Profile Photo')
                                    ->image()
                                    ->disk('public')
                                    ->directory('profile-photos')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->circleCropper()
                                    ->columnSpanFull(),
                                
                                Forms\Components\TextInput::make('full_name')
                                    ->required()
                                    ->maxLength(255),
                                
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->maxLength(255),
                                
                                Forms\Components\TextInput::make('location')
                                    ->maxLength(255),
                                
                                Forms\Components\Textarea::make('bio')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('💼 Professional')
                            ->icon('heroicon-o-briefcase')
                            ->schema([
                                Forms\Components\TextInput::make('job_title')
                                    ->label('Current Job Title')
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                
                                Forms\Components\Textarea::make('summary')
                                    ->label('Professional Summary')
                                    ->rows(6)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('🔗 Social Links')
                            ->icon('heroicon-o-link')
                            ->schema([
                                Forms\Components\TextInput::make('linkedin')
                                    ->label('LinkedIn')
                                    ->url()
                                    ->prefix('https://')
                                    ->maxLength(255)
                                    ->suffixIcon('heroicon-m-globe-alt'),
                                
                                Forms\Components\TextInput::make('github')
                                    ->label('GitHub')
                                    ->url()
                                    ->prefix('https://')
                                    ->maxLength(255)
                                    ->suffixIcon('heroicon-m-code-bracket'),
                                
                                Forms\Components\TextInput::make('website')
                                    ->label('Website/Portfolio')
                                    ->url()
                                    ->prefix('https://')
                                    ->maxLength(255)
                                    ->suffixIcon('heroicon-m-globe-alt'),
                                
                                Forms\Components\TextInput::make('twitter')
                                    ->label('Twitter')
                                    ->url()
                                    ->prefix('https://')
                                    ->maxLength(255)
                                    ->suffixIcon('heroicon-m-at-symbol'),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('⚡ Skills')
                            ->icon('heroicon-o-star')
                            ->schema([
                                Forms\Components\Repeater::make('skills')
                                    ->label('Your Skills')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Skill Name')
                                            ->required()
                                            ->placeholder('e.g. Laravel, React, UI/UX'),
                                        Forms\Components\Select::make('level')
                                            ->label('Proficiency Level')
                                            ->options([
                                                'beginner' => '⭐ Beginner',
                                                'intermediate' => '⭐⭐ Intermediate',
                                                'advanced' => '⭐⭐⭐ Advanced',
                                                'expert' => '⭐⭐⭐⭐ Expert',
                                            ])
                                            ->native(false),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->addActionLabel('➕ Add Skill')
                                    ->reorderable()
                                    ->collapsible()
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('💻 Experience')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Forms\Components\Repeater::make('experiences')
                                    ->label('Work Experience')
                                    ->schema([
                                        Forms\Components\TextInput::make('position')
                                            ->label('Job Position')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('e.g. Full Stack Developer'),
                                        Forms\Components\TextInput::make('company')
                                            ->label('Company Name')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('e.g. PT Tech Indonesia'),
                                        Forms\Components\TextInput::make('location')
                                            ->label('Location')
                                            ->maxLength(255)
                                            ->placeholder('e.g. Jakarta, Indonesia'),
                                        Forms\Components\DatePicker::make('start_date')
                                            ->label('Start Date')
                                            ->required()
                                            ->native(false),
                                        Forms\Components\DatePicker::make('end_date')
                                            ->label('End Date (Leave empty if current)')
                                            ->nullable()
                                            ->native(false),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Job Description')
                                            ->rows(4)
                                            ->placeholder('Describe your responsibilities and achievements...')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->addActionLabel('➕ Add Experience')
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['position'] ?? null)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('🎓 Education')
                            ->icon('heroicon-o-academic-cap')
                            ->schema([
                                Forms\Components\Repeater::make('education')
                                    ->label('Educational Background')
                                    ->schema([
                                        Forms\Components\TextInput::make('degree')
                                            ->label('Degree/Certificate')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('e.g. Bachelor of Computer Science'),
                                        Forms\Components\TextInput::make('institution')
                                            ->label('School/University')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('e.g. Universitas Indonesia'),
                                        Forms\Components\TextInput::make('field')
                                            ->label('Field of Study')
                                            ->maxLength(255)
                                            ->placeholder('e.g. Software Engineering'),
                                        Forms\Components\DatePicker::make('start_date')
                                            ->label('Start Date')
                                            ->required()
                                            ->native(false),
                                        Forms\Components\DatePicker::make('end_date')
                                            ->label('Graduation Date')
                                            ->nullable()
                                            ->native(false),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Achievements & Activities')
                                            ->rows(3)
                                            ->placeholder('GPA, honors, activities...')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->addActionLabel('➕ Add Education')
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['degree'] ?? null)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('🚀 Projects')
                            ->icon('heroicon-o-rocket-launch')
                            ->schema([
                                Forms\Components\Repeater::make('projects')
                                    ->label('Portfolio Projects')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Project Name')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('e.g. E-Commerce Platform'),
                                        Forms\Components\TextInput::make('url')
                                            ->label('Project URL')
                                            ->url()
                                            ->maxLength(255)
                                            ->placeholder('https://demo.example.com')
                                            ->suffixIcon('heroicon-m-arrow-top-right-on-square'),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Project Description')
                                            ->rows(3)
                                            ->placeholder('Describe the project and your role...')
                                            ->columnSpanFull(),
                                        Forms\Components\TagsInput::make('technologies')
                                            ->label('Technologies Used')
                                            ->placeholder('Press Enter to add technology')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->addActionLabel('➕ Add Project')
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('🏆 Certifications')
                            ->icon('heroicon-o-trophy')
                            ->schema([
                                Forms\Components\Repeater::make('certifications')
                                    ->label('Certificates & Awards')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Certificate Name')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('e.g. AWS Certified Developer'),
                                        Forms\Components\TextInput::make('issuer')
                                            ->label('Issued By')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('e.g. Amazon Web Services'),
                                        Forms\Components\DatePicker::make('issue_date')
                                            ->label('Issue Date')
                                            ->native(false),
                                        Forms\Components\DatePicker::make('expiry_date')
                                            ->label('Expiry Date (Optional)')
                                            ->nullable()
                                            ->native(false),
                                        Forms\Components\TextInput::make('credential_id')
                                            ->label('Credential ID')
                                            ->maxLength(255)
                                            ->placeholder('Certificate ID'),
                                        Forms\Components\TextInput::make('url')
                                            ->label('Verification URL')
                                            ->url()
                                            ->maxLength(255)
                                            ->placeholder('https://verify.example.com')
                                            ->suffixIcon('heroicon-m-check-badge'),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->addActionLabel('➕ Add Certificate')
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('🌍 Languages')
                            ->icon('heroicon-o-language')
                            ->schema([
                                Forms\Components\Repeater::make('languages')
                                    ->label('Language Skills')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Language')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('e.g. English, Indonesian'),
                                        Forms\Components\Select::make('proficiency')
                                            ->label('Proficiency Level')
                                            ->options([
                                                'basic' => '🌱 Basic',
                                                'conversational' => '💬 Conversational',
                                                'professional' => '💼 Professional',
                                                'native' => '🌟 Native',
                                            ])
                                            ->required()
                                            ->native(false),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->addActionLabel('➕ Add Language')
                                    ->reorderable()
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('📝 Additional')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\Textarea::make('additional_info')
                                    ->label('Additional Information')
                                    ->rows(6)
                                    ->placeholder('Any other information you want to share...')
                                    ->columnSpanFull(),
                                
                                Forms\Components\FileUpload::make('cv_file')
                                    ->label('📄 Upload CV/Resume File (PDF)')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->disk('public')
                                    ->directory('cv-files')
                                    ->visibility('public')
                                    ->downloadable()
                                    ->helperText('Upload your complete CV in PDF format')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('⚙️ Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\TextInput::make('slug')
                                    ->label('URL Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->helperText('URL-friendly version for your resume page')
                                    ->placeholder('e.g. john-doe-resume')
                                    ->columnSpanFull(),
                                
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Publish Resume')
                                    ->default(false)
                                    ->helperText('Make your resume visible to public')
                                    ->inline(false),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString()
                    ->contained(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_photo')
                    ->label('Photo')
                    ->disk('public')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('job_title')
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Status')
                    ->boolean()
                    ->trueLabel('Published')
                    ->falseLabel('Draft')
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function () {
                        // Cegah delete jika hanya ada 1 resume
                        if (Resume::count() <= 1) {
                            throw new \Exception('Tidak dapat menghapus resume. Minimal harus ada 1 resume.');
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function () {
                            // Cegah delete jika hanya ada 1 resume
                            if (Resume::count() <= 1) {
                                throw new \Exception('Tidak dapat menghapus resume. Minimal harus ada 1 resume.');
                            }
                        }),
                ]),
            ]);
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
            'index' => Pages\ListResumes::route('/'),
            'create' => Pages\CreateResume::route('/create'),
            'view' => Pages\ViewResume::route('/{record}'),
            'edit' => Pages\EditResume::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        // Hanya bisa create jika belum ada resume
        return Resume::count() === 0;
    }
}