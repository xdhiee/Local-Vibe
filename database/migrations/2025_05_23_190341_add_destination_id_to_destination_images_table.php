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
    Schema::table('destination_images', function (Blueprint $table) {
        $table->unsignedBigInteger('destination_id')->after('id');

        // Jika ingin relasi DB formal
        $table->foreign('destination_id')->references('id')->on('destination')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('destination_images', function (Blueprint $table) {
        $table->dropForeign(['destination_id']);
        $table->dropColumn('destination_id');
    });
}

};
