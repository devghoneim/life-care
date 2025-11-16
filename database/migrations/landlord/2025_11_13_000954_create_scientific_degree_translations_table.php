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
        Schema::create('scientific_degree_translations', function (Blueprint $table) {
           $table->id();
            $table->foreignId('scientific_id')->constrained('scientific_degrees')->cascadeOnDelete();
            $table->string('locale', 5);
            $table->string('name');
            $table->unique(['scientific_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scientific_degree_translations');
    }
};
