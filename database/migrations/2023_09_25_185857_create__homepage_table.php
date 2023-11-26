<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Homepage', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('title');
            $table->string('loc');
            $table->string('about');
            $table->string('aphoto');
            $table->string('stext');
            $table->string('etext');
            $table->string('aOfw');
            $table->string('2stext');
            $table->string('2etext');
            $table->string('2aOfw');
            $table->string('conLoc');
            $table->string('email');
            $table->string('cell');
            $table->string('infoLoc');
            $table->string('phone');
            $table->string('iemail');
            $table->string('fb');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Homepage');
    }
}
