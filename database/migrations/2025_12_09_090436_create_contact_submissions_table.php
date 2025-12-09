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
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->string('whatsapp', 20)->nullable();
            $table->text('address');
            $table->foreignId('package_id')->nullable()->constrained('internet_packages')->onDelete('set null');
            $table->enum('installation_time', ['weekday-morning', 'weekday-afternoon', 'weekend', 'flexible'])->nullable();
            $table->text('notes')->nullable();
            $table->boolean('newsletter_consent')->default(false);
            $table->enum('status', ['pending', 'contacted', 'scheduled', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};
