<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmppositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employment', function($table) {
            $table->string('created_at')->after('crcontact');
            $table->string('updated_at')->after('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employment', function($table) {
            $table->dropColumn('created_at')->after('crcontact');
            $table->dropColumn('updated_at')->after('created_at');
        });
    }
}
