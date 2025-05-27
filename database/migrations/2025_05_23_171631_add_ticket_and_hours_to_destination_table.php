<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('destination', function (Blueprint $table) {
            $table->integer('price_domestic')->nullable()->after('location');
            $table->integer('price_foreign')->nullable()->after('price_domestic');
            $table->json('opening_hours')->nullable()->after('price_foreign');
        });
    }

    public function down(): void
    {
        Schema::table('destination', function (Blueprint $table) {
            $table->dropColumn(['price_domestic', 'price_foreign', 'opening_hours']);
        });
    }
};

