<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'client',
        'project_date',
        'project_url',
        'technologies',
        'key_features',
        'image',
        'gallery',
        'is_featured',
        'is_published',
    ];

    protected $casts = [
        'project_date' => 'date',
        'image' => 'string',
        'technologies' => 'array',
        'key_features' => 'array',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });

        static::updating(function ($portfolio) {
            if ($portfolio->isDirty('title')) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });
    }
}
