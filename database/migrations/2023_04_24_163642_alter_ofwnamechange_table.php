<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOfwnamechangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ofw', function(Blueprint $table){
            $table->dropColumn("name");
        });
        Schema::table('ofw', function(Blueprint $table){
            $table->string('name')->after("userid");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ofw', function(Blueprint $table){
            $table->dropColumn('name')->after('userid');
        });
    }
}
