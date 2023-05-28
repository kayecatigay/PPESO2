<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterIscheduledropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ischedule', function (Blueprint $table) {
            $table->dropColumn('dateFrom');
            $table->dropColumn('dateTo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ischedule', function (Blueprint $table) {
            $table->dropColumn('dateFrom');
            $table->dropColumn('dateTo');
        });
    }
}
