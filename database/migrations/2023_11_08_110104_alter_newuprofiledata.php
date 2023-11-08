<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNewuprofiledata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uprofile', function (Blueprint $table) {
            $table->string('crname')->after('language')->nullable();
            $table->string('crcontact')->after('crname')->nullable();
            $table->string('ip')->after('crcontact')->nullable();
            $table->string('tribe')->after('ip')->nullable();
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
