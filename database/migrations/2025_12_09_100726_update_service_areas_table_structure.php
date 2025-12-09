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
        Schema::table('service_areas', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn(['area_name', 'is_covered', 'coverage_quality', 'notes']);
            
            // Add new columns
            $table->string('area', 100);
            $table->string('name')->nullable();
            $table->string('district', 100)->nullable();
            $table->string('rt', 10)->nullable();
            $table->string('rw', 10)->nullable();
            $table->enum('status', ['active', 'planned', 'maintenance'])->default('active');
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_areas', function (Blueprint $table) {
            // Drop new columns
            $table->dropColumn(['area', 'name', 'district', 'rt', 'rw', 'status', 'description']);
            
            // Restore old columns
            $table->string('area_name', 100);
            $table->boolean('is_covered')->default(true);
            $table->enum('coverage_quality', ['excellent', 'good', 'fair', 'limited'])->default('good');
            $table->text('notes')->nullable();
        });
    }
};
