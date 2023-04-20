<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('name')->after('id');
            $table->string('lastname')->after('name');
            $table->string('firstname')->after('lastname');
            $table->string('middlename')->after('firstname');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('name');
            $table->dropColumn('lastname');
            $table->dropColumn('firstname');
            $table->dropColumn('middlename');
        });
    }
}
