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
        Schema::create('insurance_company_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('insurancey_id')->constrained('insurance_companies')->cascadeOnDelete();
    $table->string('locale', 5)->index();
    $table->string('name')->unique();
    $table->unique(['insurancey_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_company_translations');
    }
};
