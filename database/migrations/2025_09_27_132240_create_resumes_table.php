<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            
            // Personal Information
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->text('profile_photo')->nullable();
            $table->text('bio')->nullable();
            
            // Professional Information
            $table->string('job_title')->nullable();
            $table->text('summary')->nullable();
            
            // Social Links
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('website')->nullable();
            $table->string('twitter')->nullable();
            
            // Skills (JSON)
            $table->json('skills')->nullable();
            
            // Experience (JSON)
            $table->json('experiences')->nullable();
            
            // Education (JSON)
            $table->json('education')->nullable();
            
            // Projects (JSON)
            $table->json('projects')->nullable();
            
            // Certifications (JSON)
            $table->json('certifications')->nullable();
            
            // Languages (JSON)
            $table->json('languages')->nullable();
            
            // Additional
            $table->text('additional_info')->nullable();
            
            // CV File
            $table->string('cv_file')->nullable();
            
            // Status
            $table->boolean('is_published')->default(false);
            $table->string('slug')->unique();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};