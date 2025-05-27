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
        Schema::table('destination', function (Blueprint $table) {
            // Tambahkan kolom region_id dan category_id
            $table->unsignedBigInteger('region_id')->nullable()->after('location');
            $table->unsignedBigInteger('category_id')->nullable()->after('region_id');
            
            // Tambahkan foreign key constraints
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destination', function (Blueprint $table) {
            // Drop foreign key constraints terlebih dahulu
            $table->dropForeign(['region_id']);
            $table->dropForeign(['category_id']);
            
            // Kemudian drop kolom
            $table->dropColumn(['region_id', 'category_id']);
        });
    }
};