<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToCategoriesAndRegionsTable extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('name')->after('id');
        });

        Schema::table('regions', function (Blueprint $table) {
            $table->string('name')->after('id');
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('name');
        });

        Schema::table('regions', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}

