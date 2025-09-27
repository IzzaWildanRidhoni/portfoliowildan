<?php

namespace App\Filament\Resources\ResumeResource\Pages;

use App\Filament\Resources\ResumeResource;
use App\Models\Resume;
use Filament\Resources\Pages\CreateRecord;

class CreateResume extends CreateRecord
{
    protected static string $resource = ResumeResource::class;

    public function mount(): void
    {
        // Jika sudah ada resume, redirect ke edit page
        $resume = Resume::first();
        if ($resume) {
            $this->redirect(ResumeResource::getUrl('edit', ['record' => $resume]));
            return;
        }

        parent::mount();
    }

    protected function getRedirectUrl(): string
    {
        // Redirect ke edit page setelah create
        return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    }
}