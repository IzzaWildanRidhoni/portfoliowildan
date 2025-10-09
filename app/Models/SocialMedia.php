<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_media';

    protected $fillable = [
        'platform',
        'label',
        'value',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Scope untuk mengambil yang aktif saja
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    // Helper untuk mendapatkan URL lengkap
    public function getFullUrlAttribute()
    {
        return match ($this->platform) {
            'WhatsApp' => 'https://wa.me/' . preg_replace('/[^0-9]/', '', $this->value),
            'LinkedIn' => strpos($this->value, 'http') === 0 ? $this->value : 'https://linkedin.com/in/' . $this->value,
            'Instagram' => strpos($this->value, 'http') === 0 ? $this->value : 'https://instagram.com/' . ltrim($this->value, '@'),
            'Email' => 'mailto:' . $this->value,
            'Website' => strpos($this->value, 'http') === 0 ? $this->value : 'https://' . $this->value,
            default => $this->value,
        };
    }
}
