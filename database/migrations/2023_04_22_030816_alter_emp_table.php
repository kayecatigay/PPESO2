<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employment', function(Blueprint $table){
            $table->dropColumn("created_at");
            $table->dropColumn("updated_at");
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
            $table->string('created_at')->after("crcontact");
            $table->string('updated_at')->after("created_at");
        });
    }
}
