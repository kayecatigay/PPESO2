<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterScholarshipdropallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholarship', function($table) {
            $table->dropColumn('name');
            $table->dropColumn('sex');
            $table->dropColumn('address');
            $table->dropColumn('emailadd');
            $table->dropColumn('contactnum');
            $table->dropColumn('birthday');
            $table->dropColumn('placeofbirth');
            $table->dropColumn('age');
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('bloodtype');
            $table->dropColumn('religion');
            $table->dropColumn('guardian');
            $table->dropColumn('relation');
            $table->dropColumn('yGraduated');
            $table->dropColumn('school');
            $table->dropColumn('work');
            $table->dropColumn('companyn');
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
