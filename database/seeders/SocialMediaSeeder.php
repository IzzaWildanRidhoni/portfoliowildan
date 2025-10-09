<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    public function run(): void
    {
        $socialMedia = [
            [
                'platform' => 'WhatsApp',
                'label' => 'WhatsApp',
                'value' => '+62 856 4330 1453',
                'icon' => 'bi bi-whatsapp',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'platform' => 'LinkedIn',
                'label' => 'LinkedIn',
                'value' => 'linkedin.com/in/izzawildan',
                'icon' => 'bi bi-linkedin',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'platform' => 'Website',
                'label' => 'Website',
                'value' => 'izzawildan.my.id',
                'icon' => 'bi bi-globe',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'platform' => 'Email',
                'label' => 'Email',
                'value' => 'me@izzawildan.my.id',
                'icon' => 'bi bi-envelope',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'platform' => 'Instagram',
                'label' => 'Instagram',
                'value' => '@izza.wildan',
                'icon' => 'bi bi-instagram',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($socialMedia as $social) {
            SocialMedia::create($social);
        }
    }
}
