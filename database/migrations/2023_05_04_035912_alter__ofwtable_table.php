<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOfwtableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ofw', function(Blueprint $table){
            $table->string("JobDesc")->after("fbacc");
            $table->string("OfwCat")->after("JobDesc");
            $table->string("SeaB")->after("OfwCat");
            $table->string("LandB")->after("SeaB");
            $table->string("Company")->after("LandB");
            $table->string("Country")->after("Company");
            $table->string("PeriodOfEmp")->after("Country");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ofw', function(Blueprint $table){
            $table->dropColumn("JobDesc")->after("fbacc");
            $table->dropColumn("OfwCat")->after("JobDesc");
            $table->dropColumn("SeaB")->after("OfwCat");
            $table->dropColumn("LandB")->after("SeaB");
            $table->dropColumn("Company")->after("LandB");
            $table->dropColumn("Country")->after("Company");
            $table->dropColumn("PeriodOfEmp")->after("Country");
        });
    }
}
