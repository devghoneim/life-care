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
        Schema::create('contact_us_type_translations', function (Blueprint $table) {
            $table->id();
             $table->foreignId('contact_us_type_id')->constrained('contact_us_types')->cascadeOnDelete();
    $table->string('locale', 5)->index();
    $table->string('name');
    $table->unique(['contact_us_type_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us_type_translations');
    }
};
