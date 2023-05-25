<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uwork', function (Blueprint $table) {
            $table->id();
            $table->string('cname');
            $table->string('position');
            $table->string('crname');
            $table->string('crcontact');
            $table->string('crcname');
            $table->string('crposi');
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
        Schema::dropIfExists('uwork');
    }
}
