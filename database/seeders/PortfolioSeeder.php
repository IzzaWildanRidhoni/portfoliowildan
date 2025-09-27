<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'description' => 'Platform e-commerce lengkap dengan fitur payment gateway, inventory management, dan dashboard analytics.',
                'category' => 'E-Commerce',
                'client' => 'PT Digital Indonesia',
                'project_date' => '2024-01-15',
                'project_url' => 'https://example-ecommerce.com',
                'technologies' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL'],
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Mobile Banking App',
                'slug' => 'mobile-banking-app',
                'description' => 'Aplikasi mobile banking dengan fitur transfer, pembayaran, dan investasi.',
                'category' => 'Mobile App',
                'client' => 'Bank Digital',
                'project_date' => '2024-03-20',
                'project_url' => null,
                'technologies' => ['React Native', 'Node.js', 'PostgreSQL'],
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Company Profile Website',
                'slug' => 'company-profile-website',
                'description' => 'Website company profile dengan design modern dan responsive.',
                'category' => 'Web Development',
                'client' => 'CV Maju Jaya',
                'project_date' => '2024-05-10',
                'project_url' => 'https://example-company.com',
                'technologies' => ['Laravel', 'Bootstrap', 'MySQL'],
                'is_featured' => false,
                'is_published' => true,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}