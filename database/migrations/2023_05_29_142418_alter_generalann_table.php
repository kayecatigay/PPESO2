<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGeneralannTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('genannouncements', function (Blueprint $table) {
            $table->dropColumn('description/body');
        });
        Schema::table('genannouncements', function (Blueprint $table) {
            $table->string('body')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genannouncements', function (Blueprint $table) {
            $table->dropColumn('body')->after('title');
        });
    }
}
