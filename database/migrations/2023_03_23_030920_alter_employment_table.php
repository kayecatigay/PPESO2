<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmploymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employment', function($table) {
            $table->string('posidesired');
            $table->string('name');
            $table->string('gender');
            $table->string('address');
            $table->string('telephone');
            $table->string('cellphone');
            $table->string('emailadd');
            $table->string('birthday');
            $table->string('Cstatus');
            $table->string('spouse');
            $table->integer('height');
            $table->integer('weight');
            $table->string('religion');
            $table->string('language');
            $table->string('elem');
            $table->string('hschool');
            $table->string('college');
            $table->string('degree');
            $table->string('cname');
            $table->string('position');
            $table->string('crname');
            $table->string('crcompany');
            $table->string('crposition');
            $table->string('crcontact');
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
            $table->dropColumn('posidesired');
            $table->dropColumn('name');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('telephone');
            $table->dropColumn('cellphone');
            $table->dropColumn('emailadd');
            $table->dropColumn('birthday');
            $table->dropColumn('Cstatus');
            $table->dropColumn('spouse');
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('religion');
            $table->dropColumn('language');
            $table->dropColumn('elem');
            $table->dropColumn('hschool');
            $table->dropColumn('college');
            $table->dropColumn('degree');
            $table->dropColumn('cname');
            $table->dropColumn('position');
            $table->dropColumn('crname');
            $table->dropColumn('crcompany');
            $table->dropColumn('crposition');
            $table->dropColumn('crcontact');
        });
    }
}
