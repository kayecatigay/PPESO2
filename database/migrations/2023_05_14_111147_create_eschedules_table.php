<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eschedules', function (Blueprint $table) {
            $table->id();
            $table->string('Userid');
            $table->string('EmName');
            $table->string('Date');
            $table->string('Time');
            $table->string('Loc');
            $table->string('work');
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
        Schema::dropIfExists('eschedules');
    }
}
