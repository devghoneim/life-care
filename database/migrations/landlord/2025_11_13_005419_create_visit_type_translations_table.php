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
        Schema::create('visit_type_translations', function (Blueprint $table) {
                $table->id();
    $table->foreignId('visit_type_id')->constrained('visit_types')->cascadeOnDelete();
    $table->string('locale', 5)->index();
    $table->string('name');
    $table->unique(['visit_type_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit_type_translations');
    }
};
