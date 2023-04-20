<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofw', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('suffix');
            $table->string('birthday');
            $table->integer('age');
            $table->string('sex');
            $table->string('contactnum');
            $table->string('add');
            $table->string('passnum');
            $table->string('emailadd');
            $table->string('fbacc');
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
        Schema::dropIfExists('ofw');
    }
}
