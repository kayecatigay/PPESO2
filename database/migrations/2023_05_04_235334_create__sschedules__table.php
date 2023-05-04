<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sschedules', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('ScName');
            $table->string('Date');
            $table->string('Time');
            $table->string('Loc');
            $table->string('Proctor');
            $table->string('Req');
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
        Schema::dropIfExists('Sschedules');
    }
}
