<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('destination', function (Blueprint $table) {
            $table->string('name', 255)->after('id');
            $table->text('description')->nullable()->after('name');
            $table->string('location')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('destination', function (Blueprint $table) {
            $table->dropColumn(['name', 'description', 'location']);
        });
    }
};
