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
        Schema::create('support_tickets', function (Blueprint $table) {
              $table->id();
    $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
    $table->foreignId('service_provider_id')->nullable()->constrained('tenants')->nullOnDelete();
    $table->foreignId('contact_us_type_id')->constrained('contact_us_types')->cascadeOnDelete();
    $table->text('message');
    $table->enum('status', ['pending', 'in_progress', 'resolved', 'closed'])->default('pending');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
