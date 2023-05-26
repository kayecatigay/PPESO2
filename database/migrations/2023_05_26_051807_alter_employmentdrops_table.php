<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmploymentdropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employment', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('telephone');
            $table->dropColumn('cellphone');
            $table->dropColumn('emailadd');
            $table->dropColumn('birthday');
            $table->dropColumn('Cstatus');
            $table->dropColumn('spouse');
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('religion');
            $table->dropColumn('language');
            $table->dropColumn('elem');
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
