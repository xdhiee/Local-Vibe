<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('destination', function (Blueprint $table) {
        $table->string('featured_image')->nullable()->after('location');
    });
}

public function down()
{
    Schema::table('destination', function (Blueprint $table) {
        $table->dropColumn('featured_image');
    });
}

};
