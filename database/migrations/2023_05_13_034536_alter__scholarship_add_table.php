<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterScholarshipAddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholarship', function($table) {
            $table->string('typeS')->after('id');
            $table->string('yGraduated')->after('relation');
            $table->string('school')->after('yGraduated');
            $table->string('work')->after('school');
            $table->string('companyn')->after('work');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarship', function($table) {
            $table->dropColumn('typeS')->after('id');
            $table->dropColumn('yGraduated')->after('relation');
            $table->dropColumn('school')->after('yGraduated');
            $table->dropColumn('work')->after('school');
            $table->dropColumn('companyn')->after('work');
        });
    }
}
