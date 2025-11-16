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
        Schema::create('service_provider_type_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sp_type_id')->constrained('service_provider_types')->cascadeOnDelete();
            $table->string('locale',5);
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_provider_type_translations');
    }
};
