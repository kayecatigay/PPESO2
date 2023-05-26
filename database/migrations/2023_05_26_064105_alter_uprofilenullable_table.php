<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUprofilenullableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uprofile', function($table) {
            $table->integer('suffix')->nullable()->change();
            $table->integer('gender')->nullable()->change();
            $table->integer('address')->nullable()->change();
            $table->integer('contactnum')->nullable()->change();
            $table->integer('telenum')->nullable()->change();
            $table->integer('emailadd')->nullable()->change();
            $table->integer('pobirth')->nullable()->change();
            $table->integer('passnum')->nullable()->change();
            $table->integer('birthday')->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->integer('height')->nullable()->change();
            $table->integer('weight')->nullable()->change();
            $table->integer('bloodtype')->nullable()->change();
            $table->integer('yGraduated')->nullable()->change();
            $table->integer('school')->nullable()->change();
            $table->integer('work')->nullable()->change();
            $table->integer('cname')->nullable()->change();
            $table->integer('guardian')->nullable()->change();
            $table->integer('relation')->nullable()->change();
            $table->integer('cstatus')->nullable()->change();
            $table->integer('spouse')->nullable()->change();
            $table->integer('language')->nullable()->change();
            $table->integer('elem')->nullable()->change();
            $table->integer('hs')->nullable()->change();
            $table->integer('college')->nullable()->change();
            $table->integer('degree')->nullable()->change();
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
