<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GenAnnouncements', function (Blueprint $table) {
            $table->id();
            $table->string('service');
            $table->string('title');
            $table->string('description/body');
            $table->date('dateFrom');
            $table->date('dateTo');
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
        Schema::dropIfExists('GenAnnouncements');
    }
}
