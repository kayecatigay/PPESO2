<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUseridpositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employment', function(Blueprint $table){
            $table->dropColumn("userid");
        });
        Schema::table('employment', function(Blueprint $table){
            $table->string('userid')->after("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employment', function(Blueprint $table){
            $table->dropColumn('userid')->after('id');
        });
    }
}
