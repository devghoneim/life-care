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
        Schema::create('report_type_translations', function (Blueprint $table) {
               $table->id();
    $table->foreignId('report_type_id')->constrained('report_types')->cascadeOnDelete();
    $table->string('locale', 5)->index();
    $table->string('name');
    $table->unique(['report_type_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_type_translations');
    }
};
