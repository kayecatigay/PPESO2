<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sex');
            $table->string('address');
            $table->string('emailadd');
            $table->string('contactnum');
            $table->date('birthday');
            $table->string('placeofbirth');
            $table->integer('age');
            $table->float('height');
            $table->float('weight');
            $table->string('bloodtype');
            $table->string('religion');
            $table->string('guardian');
            $table->string('relation');
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
        Schema::dropIfExists('scholarship');
    }
}
