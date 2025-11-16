<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scientific_title_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scientific_title_id')->constrained('scientific_titles')->cascadeOnDelete();
            $table->string('locale', 5)->index();
            $table->string('name');
            $table->unique(['scientific_title_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scientific_title_translations');
    }
};
