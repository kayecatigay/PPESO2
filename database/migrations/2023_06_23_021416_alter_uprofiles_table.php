<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uprofile', function (Blueprint $table) {
            $table->dropColumn('address');
        });
        Schema::table('uprofile', function (Blueprint $table) {
            $table->string('region')->after('gender');
            $table->string('province')->after('region');
            $table->string('mun')->after('province');
            $table->string('barangay')->after('mun');
            $table->string('sitio')->after('barangay');
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
