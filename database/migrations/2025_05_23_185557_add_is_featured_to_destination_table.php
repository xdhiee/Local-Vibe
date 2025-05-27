<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('destination', function (Blueprint $table) {
            $table->boolean('is_featured')->default(false)->after('opening_hours');
        });
    }

    public function down(): void
    {
        Schema::table('destination', function (Blueprint $table) {
            $table->dropColumn('is_featured');
        });
    }
};

