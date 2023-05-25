<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOfwdropallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ofw', function($table) {
            $table->dropColumn('lastname');
            $table->dropColumn('firstname');
            $table->dropColumn('middlename');
            $table->dropColumn('suffix');
            $table->dropColumn('birthday');
            $table->dropColumn('age');
            $table->dropColumn('sex');
            $table->dropColumn('contactnum');
            $table->dropColumn('address');
            $table->dropColumn('passnum');
            $table->dropColumn('emailadd');
            $table->dropColumn('fbacc');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('ofw', function($table) {
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
