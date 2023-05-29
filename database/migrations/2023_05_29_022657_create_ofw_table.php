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
            $table->integer('userid');
            $table->string('appID');
            $table->date('date');
            $table->string('status');
            $table->string('JobDesc');
            $table->string('OfwCat');
            $table->string('Company');
            $table->string('Country');
            $table->string('PeriodOfEmp');
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
