<?php

namespace App\Filament\Resources\ResumeResource\Pages;

use App\Filament\Resources\ResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResume extends EditRecord
{
    protected static string $resource = ResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Remove delete action atau tambahkan dengan validasi
            Actions\DeleteAction::make()
                ->before(function () {
                    throw new \Exception('Tidak dapat menghapus resume. Minimal harus ada 1 resume.');
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        // Stay on edit page after save
        return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    }
}