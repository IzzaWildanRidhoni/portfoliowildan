<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('category');
            $table->string('client')->nullable();
            $table->date('project_date');
            $table->string('project_url')->nullable();
            $table->json('technologies')->nullable(); // Array untuk teknologi yang digunakan
            $table->string('image')->nullable();
            $table->json('gallery')->nullable(); // Array untuk multiple images
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};