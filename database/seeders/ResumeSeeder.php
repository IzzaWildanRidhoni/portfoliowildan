<?php

namespace Database\Seeders;

use App\Models\Resume;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    public function run(): void
    {
        Resume::create([
            'full_name' => 'Nama Anda', // Ganti dengan nama Anda
            'email' => 'email@example.com', // Ganti dengan email Anda
            'phone' => '+62 812-xxxx-xxxx', // Ganti dengan nomor Anda
            'location' => 'Temanggung, Indonesia',
            'bio' => 'Berpengalaman sebagai Full Stack Web Developer, Media Coordinator, dan Asisten Laboratorium dengan keahlian di bidang pengembangan aplikasi, desain UI/UX, manajemen database, serta manajemen media digital.',
            'job_title' => 'Full Stack Web Developer',
            'summary' => 'Lulusan Terbaik Teknik Informatika IST AKPRIND dengan IPK 3.96/4.00. Berpengalaman dalam pengembangan aplikasi web menggunakan Laravel, CodeIgniter, React.js, Vue.js, dan teknologi modern lainnya. Memiliki kemampuan dalam desain UI/UX, manajemen database, dan pengembangan API. Aktif dalam kegiatan organisasi sebagai Media Coordinator dan Asisten Laboratorium.',
            
            // Social Links - Sesuaikan dengan profil Anda
            'linkedin' => 'https://linkedin.com/in/your-profile',
            'github' => 'https://github.com/your-username',
            'website' => 'https://cdmssyuhada.com',
            'twitter' => null,
            
            // Professional Skills
            'skills' => [
                // Programming Languages & Frameworks
                ['name' => 'PHP', 'level' => 'expert'],
                ['name' => 'Laravel', 'level' => 'expert'],
                ['name' => 'CodeIgniter', 'level' => 'advanced'],
                ['name' => 'JavaScript', 'level' => 'advanced'],
                ['name' => 'TypeScript', 'level' => 'advanced'],
                ['name' => 'React.js', 'level' => 'advanced'],
                ['name' => 'Next.js', 'level' => 'advanced'],
                ['name' => 'Vue.js', 'level' => 'advanced'],
                
                // Frontend
                ['name' => 'HTML', 'level' => 'expert'],
                ['name' => 'CSS', 'level' => 'expert'],
                ['name' => 'Bootstrap', 'level' => 'expert'],
                ['name' => 'Tailwind CSS', 'level' => 'advanced'],
                ['name' => 'SASS', 'level' => 'advanced'],
                
                // Database
                ['name' => 'MySQL', 'level' => 'expert'],
                ['name' => 'PostgreSQL', 'level' => 'advanced'],
                ['name' => 'MS SQL', 'level' => 'advanced'],
                ['name' => 'MS Access', 'level' => 'intermediate'],
                ['name' => 'Supabase', 'level' => 'intermediate'],
                
                // API Development
                ['name' => 'REST API', 'level' => 'advanced'],
                ['name' => 'Swagger', 'level' => 'advanced'],
                ['name' => 'JWT', 'level' => 'advanced'],
                ['name' => 'Postman', 'level' => 'advanced'],
                
                // UI/UX & Design
                ['name' => 'Figma', 'level' => 'advanced'],
                ['name' => 'Adobe XD', 'level' => 'advanced'],
                ['name' => 'CorelDRAW', 'level' => 'advanced'],
                ['name' => 'Canva', 'level' => 'expert'],
                
                // Media & Editing
                ['name' => 'CapCut', 'level' => 'advanced'],
                ['name' => 'Kdenlive', 'level' => 'intermediate'],
                ['name' => 'Audacity', 'level' => 'intermediate'],
                ['name' => 'Livestreaming', 'level' => 'advanced'],
                
                // Version Control & Collaboration
                ['name' => 'Git', 'level' => 'advanced'],
                ['name' => 'GitHub', 'level' => 'advanced'],
                ['name' => 'GitLab', 'level' => 'advanced'],
                ['name' => 'Jira', 'level' => 'intermediate'],
                
                // Security
                ['name' => 'Burp Suite', 'level' => 'intermediate'],
                
                // Other
                ['name' => 'WordPress', 'level' => 'advanced'],
                ['name' => 'Linux', 'level' => 'intermediate'],
                ['name' => 'Bash', 'level' => 'intermediate'],
                ['name' => 'C++', 'level' => 'intermediate'],
            ],
            
            // Work Experience
            'experiences' => [
                [
                    'position' => 'Staff IT | Full Stack Web Developer',
                    'company' => 'PT. Shoenary Javanesia Inc',
                    'location' => 'Temanggung, Indonesia',
                    'start_date' => '2024-03-01',
                    'end_date' => null,
                    'description' => 'Maintain, query, dan develop aplikasi internal perusahaan. Membuat modul baru sesuai permintaan user. Analisa & troubleshooting permasalahan sistem. Pengembangan aplikasi: Asset Management, CEISA (Host to Host EXIM), ERP, ESS, dan IT Inventory. Tools: Laravel, CodeIgniter, MS SQL, MySQL, API, UI/UX, Git, GitLab.',
                ],
                [
                    'position' => 'Media Coordinator (Part-time)',
                    'company' => 'Corps Dakwah Masjid Syuhada',
                    'location' => 'Yogyakarta, Indonesia',
                    'start_date' => '2021-12-01',
                    'end_date' => null,
                    'description' => 'Desain poster/banner kajian rutin & event bulanan. Dokumentasi, livestreaming, dan podcast kajian. Pembuatan video reels dakwah (1-2 menit). Pengelolaan website cdmssyuhada.com. Manajemen media sosial (WhatsApp, Facebook, Instagram, YouTube, TikTok).',
                ],
                [
                    'position' => 'Fullstack Web Developer (Internship)',
                    'company' => 'PT Baracipta Esa Engineering / ECC.co.id',
                    'location' => 'Yogyakarta, Indonesia',
                    'start_date' => '2023-08-01',
                    'end_date' => '2023-12-31',
                    'description' => 'Implementasi mockup UI/UX ke aplikasi web. Integrasi RESTful API & database MySQL/PostgreSQL. Pengujian sistem menggunakan UAT. Pengembangan RWD (Responsive Web Design). Tools: Laravel, Bootstrap, Vite, Swagger, JWT, Git, GitLab, Jira, Postman.',
                ],
                [
                    'position' => 'Database & Programming Lab Assistant',
                    'company' => 'Institut Sains & Teknologi AKPRIND',
                    'location' => 'Yogyakarta, Indonesia',
                    'start_date' => '2022-10-01',
                    'end_date' => '2023-12-31',
                    'description' => 'Membimbing praktikum Basis Data, Rekayasa Web, Sistem Operasi, Struktur Data, dan Pemrograman Dasar. Tools: PostgreSQL, Figma, WordPress, Bash, Linux, C++.',
                ],
                [
                    'position' => 'Full Stack Developer (Internship)',
                    'company' => 'Nama Perusahaan', // Sesuaikan dengan data Anda
                    'location' => 'Lokasi', // Sesuaikan dengan data Anda
                    'start_date' => '2019-01-01',
                    'end_date' => '2019-04-30',
                    'description' => 'Detail pengalaman kerja Anda di sini.', // Tambahkan deskripsi
                ],
            ],
            
            // Education
            'education' => [
                [
                    'degree' => 'Bachelor of Engineering (Informatics)',
                    'institution' => 'Institut Sains & Teknologi AKPRIND Yogyakarta',
                    'field' => 'Rekayasa Perangkat Lunak',
                    'start_date' => '2020-08-01',
                    'end_date' => '2024-06-30',
                    'description' => 'Lulusan Terbaik dengan IPK 3.96 / 4.00',
                ],
                [
                    'degree' => 'Rekayasa Perangkat Lunak',
                    'institution' => 'SMK N 1 Tembarak',
                    'field' => 'Teknik Komputer dan Informatika',
                    'start_date' => '2017-07-01',
                    'end_date' => '2020-06-30',
                    'description' => 'SMK jurusan Rekayasa Perangkat Lunak',
                ],
            ],
            
            // Projects - Tambahkan project portfolio Anda
            'projects' => [
                [
                    'name' => 'Asset Management System',
                    'url' => null,
                    'description' => 'Sistem manajemen aset internal untuk PT. Shoenary Javanesia Inc. Aplikasi untuk tracking dan monitoring aset perusahaan dengan fitur QR Code.',
                    'technologies' => ['Laravel', 'MS SQL', 'Bootstrap', 'QR Code'],
                ],
                [
                    'name' => 'CEISA Host to Host EXIM',
                    'url' => null,
                    'description' => 'Integrasi sistem internal dengan sistem CEISA Bea Cukai untuk proses ekspor-impor otomatis.',
                    'technologies' => ['Laravel', 'REST API', 'MS SQL', 'CEISA API'],
                ],
                [
                    'name' => 'Website CDMS Syuhada',
                    'url' => 'https://cdmssyuhada.com',
                    'description' => 'Website organisasi Corps Dakwah Masjid Syuhada untuk informasi kajian, artikel dakwah, dan manajemen konten.',
                    'technologies' => ['Laravel', 'MySQL', 'Bootstrap', 'CMS'],
                ],
                [
                    'name' => 'IT Inventory System',
                    'url' => null,
                    'description' => 'Sistem inventaris IT untuk tracking perangkat, maintenance, dan peminjaman equipment IT.',
                    'technologies' => ['Laravel', 'MySQL', 'Tailwind CSS', 'Livewire'],
                ],
            ],
            
            // Certifications - Tambahkan sertifikat Anda jika ada
            'certifications' => [
                // Contoh, sesuaikan dengan sertifikat yang Anda miliki
                [
                    'name' => 'Contoh Sertifikat',
                    'issuer' => 'Issuer',
                    'issue_date' => '2023-01-01',
                    'expiry_date' => null,
                    'credential_id' => 'CERT-123',
                    'url' => null,
                ],
            ],
            
            // Languages
            'languages' => [
                ['name' => 'Bahasa Indonesia', 'proficiency' => 'native'],
                ['name' => 'English', 'proficiency' => 'professional'],
            ],
            
            // Additional Info
            'additional_info' => 'Lulusan Terbaik S1 Teknik Informatika dengan IPK 3.96/4.00. Aktif dalam organisasi keagamaan dan sosial. Memiliki pengalaman dalam mengelola media digital dan konten dakwah. Siap bekerja dalam tim maupun individu dengan dedikasi tinggi.',
            
            // Status
            'is_published' => true,
            'slug' => 'resume-saya', // Ganti dengan slug yang Anda inginkan
        ]);
    }
}