<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'location',
        'profile_photo',
        'bio',
        'job_title',
        'summary',
        'linkedin',
        'github',
        'website',
        'twitter',
        'skills',
        'experiences',
        'education',
        'projects',
        'certifications',
        'languages',
        'additional_info',
        'cv_file',
        'is_published',
        'slug',
    ];

    protected $casts = [
        'skills' => 'array',
        'experiences' => 'array',
        'education' => 'array',
        'projects' => 'array',
        'certifications' => 'array',
        'languages' => 'array',
        'is_published' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($resume) {
            // Cek apakah sudah ada resume
            if (Resume::count() > 0) {
                throw new \Exception('Hanya bisa membuat 1 resume. Silakan edit resume yang sudah ada.');
            }
            
            if (empty($resume->slug)) {
                $resume->slug = Str::slug($resume->full_name . '-' . Str::random(5));
            }
        });

        static::deleting(function ($resume) {
            // Cegah delete jika hanya ada 1 resume
            if (Resume::count() <= 1) {
                throw new \Exception('Tidak dapat menghapus resume. Minimal harus ada 1 resume.');
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}