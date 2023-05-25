<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmploymentDropallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employment', function($table) {
            
            $table->dropColumn('hschool');
            $table->dropColumn('college');
            $table->dropColumn('degree');
            $table->dropColumn('position');
            $table->dropColumn('crcompany');
            $table->dropColumn('crposition');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('employment', function($table) {
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
