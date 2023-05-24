<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uprofile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('suffix');
            $table->string('gender');
            $table->string('address');
            $table->string('contactnum');
            $table->string('telenum');
            $table->string('emailadd');
            $table->string('pobirth');
            $table->string('passnum');
            $table->string('birthday');
            $table->string('age');
            $table->string('height');
            $table->string('weight');
            $table->string('bloodtype');
            $table->string('yGraduated');
            $table->string('school');
            $table->string('work');
            $table->string('cname');
            $table->string('guardian');
            $table->string('relation');
            $table->string('cstatus');
            $table->string('spouse');
            $table->string('language');
            $table->string('elem');
            $table->string('hs');
            $table->string('college');
            $table->string('degree');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uprofile');
    }
}
