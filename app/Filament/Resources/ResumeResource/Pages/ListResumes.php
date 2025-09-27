<?php

namespace App\Filament\Resources\ResumeResource\Pages;

use App\Filament\Resources\ResumeResource;
use App\Models\Resume;
use Filament\Resources\Pages\ListRecords;

class ListResumes extends ListRecords
{
    protected static string $resource = ResumeResource::class;

    public function mount(): void
    {
        parent::mount();
        
        // Jika sudah ada resume, redirect ke edit page
        $resume = Resume::first();
        if ($resume) {
            $this->redirect(ResumeResource::getUrl('edit', ['record' => $resume]));
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            // Tidak perlu create action karena sudah dicek di canCreate()
        ];
    }
}