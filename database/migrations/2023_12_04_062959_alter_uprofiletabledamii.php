<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUprofiletabledamii extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uprofile', function(Blueprint $table)
        {
            $table->string('DuetoCovid')->nullable()->change();
            $table->string('since')->nullable()->change();
            $table->string('TypeofD')->nullable()->change();
            $table->string('otherType')->nullable()->change();
            $table->string('fAssistance')->nullable()->change();
            $table->string('typeofA')->nullable()->change();
            $table->string('eligibility')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
