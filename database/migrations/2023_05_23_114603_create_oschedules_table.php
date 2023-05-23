<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oschedules', function (Blueprint $table) {
            $table->id();
            $table->string('Userid');
            $table->string('ofwname');
            $table->string('date');
            $table->string('time');
            $table->string('loc');
            $table->string('work');
            $table->string('proctor');
            $table->string('req');
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
        Schema::dropIfExists('oschedules');
    }
}
