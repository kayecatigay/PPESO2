<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUprofileintegerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uprofile', function($table) {
            $table->string('suffix')->change();
            $table->string('gender')->change();
            $table->string('address')->change();
            $table->string('contactnum')->change();
            $table->string('telenum')->change();
            $table->string('emailadd')->change();
            $table->string('pobirth')->change();
            $table->string('passnum')->change();
            $table->date('birthday')->change();
            $table->integer('age')->change();
            $table->string('height')->change();
            $table->string('weight')->change();
            $table->string('bloodtype')->change();
            $table->string('yGraduated')->change();
            $table->string('school')->change();
            $table->string('work')->change();
            $table->string('cname')->change();
            $table->string('guardian')->change();
            $table->string('relation')->change();
            $table->string('cstatus')->change();
            $table->string('spouse')->change();
            $table->string('language')->change();
            $table->string('elem')->change();
            $table->string('hs')->change();
            $table->string('college')->change();
            $table->string('degree')->change();
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
