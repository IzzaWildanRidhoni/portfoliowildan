<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'subject' => 'Inquiry about Web Development Services',
                'message' => 'Hi, I am interested in developing a company profile website for my business. Could you please provide information about your services, timeline, and pricing? Looking forward to your response.',
                'status' => 'unread',
                'admin_notes' => null,
                'read_at' => null,
                'created_at' => Carbon::now()->subHours(2),
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@yahoo.com',
                'subject' => 'E-Commerce Platform Development',
                'message' => 'Hello! I run a fashion boutique and would like to expand my business online. I need an e-commerce platform with payment gateway integration. Can we discuss this further? Thank you!',
                'status' => 'read',
                'admin_notes' => 'Client interested in full e-commerce solution. Schedule meeting next week.',
                'read_at' => Carbon::now()->subHours(1),
                'created_at' => Carbon::now()->subDays(1),
            ],
        ];

        foreach ($messages as $message) {
            ContactMessage::create($message);
        }

        $this->command->info('✅ Contact Messages seeded successfully!');
    }
}
