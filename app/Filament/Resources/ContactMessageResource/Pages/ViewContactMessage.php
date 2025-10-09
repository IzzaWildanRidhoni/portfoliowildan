<?php

namespace App\Filament\Resources\ContactMessageResource\Pages;

use App\Filament\Resources\ContactMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use App\Models\ContactMessage;

class ViewContactMessage extends ViewRecord
{
    protected static string $resource = ContactMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('markAsRead')
                ->label('Tandai Sudah Dibaca')
                ->icon('heroicon-o-check')
                ->color('success')
                ->visible(fn(ContactMessage $record) => $record->status === 'unread')
                ->requiresConfirmation()
                ->action(function (ContactMessage $record) {
                    $record->markAsRead();

                    Notification::make()
                        ->title('Pesan ditandai sebagai sudah dibaca')
                        ->success()
                        ->send();

                    $this->redirect($this->getResource()::getUrl('view', ['record' => $record]));
                }),

            Actions\Action::make('markAsReplied')
                ->label('Tandai Sudah Dibalas')
                ->icon('heroicon-o-paper-airplane')
                ->color('primary')
                ->visible(fn(ContactMessage $record) => in_array($record->status, ['unread', 'read']))
                ->requiresConfirmation()
                ->action(function (ContactMessage $record) {
                    $record->markAsReplied();

                    Notification::make()
                        ->title('Pesan ditandai sebagai sudah dibalas')
                        ->success()
                        ->send();

                    $this->redirect($this->getResource()::getUrl('view', ['record' => $record]));
                }),

            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Informasi Pengirim')
                    ->schema([
                        Infolists\Components\TextEntry::make('name')
                            ->label('Nama'),
                        Infolists\Components\TextEntry::make('email')
                            ->label('Email')
                            ->copyable()
                            ->icon('heroicon-o-envelope'),
                        Infolists\Components\TextEntry::make('subject')
                            ->label('Subject')
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('message')
                            ->label('Pesan')
                            ->columnSpanFull()
                            ->prose(),
                    ])->columns(2),

                Infolists\Components\Section::make('Status & Informasi')
                    ->schema([
                        Infolists\Components\TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'unread' => 'danger',
                                'read' => 'warning',
                                'replied' => 'success',
                                'archived' => 'gray',
                            })
                            ->formatStateUsing(fn(string $state): string => match ($state) {
                                'unread' => 'Belum Dibaca',
                                'read' => 'Sudah Dibaca',
                                'replied' => 'Sudah Dibalas',
                                'archived' => 'Diarsipkan',
                                default => $state,
                            }),
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Diterima Pada')
                            ->dateTime('d M Y H:i'),
                        Infolists\Components\TextEntry::make('read_at')
                            ->label('Dibaca Pada')
                            ->dateTime('d M Y H:i')
                            ->placeholder('Belum dibaca'),
                        Infolists\Components\TextEntry::make('admin_notes')
                            ->label('Catatan Admin')
                            ->placeholder('Tidak ada catatan')
                            ->columnSpanFull()
                            ->prose(),
                    ])->columns(3),
            ]);
    }
}
