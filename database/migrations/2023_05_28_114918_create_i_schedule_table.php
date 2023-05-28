<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iSchedule', function (Blueprint $table) {
            $table->id();
            $table->string('service');
            $table->string('title');
            $table->string('proctor');
            $table->string('req');
            $table->dateTime('dateFrom');
            $table->dateTime('dateTo');
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
        Schema::dropIfExists('i_schedule');
    }
}
