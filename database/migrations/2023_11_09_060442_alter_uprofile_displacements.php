<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUprofileDisplacements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uprofile', function (Blueprint $table) {
            $table->string('DuetoCovid')->after('degree');
            $table->string('since')->after('DuetoCovid');
            $table->string('DOArrival')->after('since');
            $table->string('TypeofD')->after('DOArrival');
            $table->string('otherType')->after('TypeofD');
            $table->string('fAssistance')->after('otherType');
            $table->string('typeofA')->after('fAssistance');
            $table->string('eligibility')->after('typeofA');
            $table->string('dateReceived')->after('eligibility');
            
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
