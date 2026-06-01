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
        Schema::table('brochures', function (Blueprint $table) {
            // Tambahkan start_date dan end_date jika belum ada
            if (!Schema::hasColumn('brochures', 'start_date')) {
                $table->date('start_date')->nullable();
            }
            if (!Schema::hasColumn('brochures', 'end_date')) {
                $table->date('end_date')->nullable();
            }
            // Tambahkan is_active jika belum ada
            if (!Schema::hasColumn('brochures', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brochures', function (Blueprint $table) {
            $table->dropColumnIfExists('start_date');
            $table->dropColumnIfExists('end_date');
            $table->dropColumnIfExists('is_active');
        });
    }
};
