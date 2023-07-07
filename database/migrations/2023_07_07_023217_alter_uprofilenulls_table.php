<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUprofilenullsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uprofile', function (Blueprint $table) {
            $table->string('region')->after('gender')->nullable()->change();
            $table->string('province')->after('region')->nullable()->change();
            $table->string('mun')->after('province')->nullable()->change();
            $table->string('barangay')->after('mun')->nullable()->change();
            $table->string('sitio')->after('barangay')->nullable()->change();
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
