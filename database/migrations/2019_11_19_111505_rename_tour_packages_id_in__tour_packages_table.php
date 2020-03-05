<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTourPackagesIdInTourPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_tour_packages', function (Blueprint $table) {
            $table->renameColumn('tour_packages_id','id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_tour_packages', function (Blueprint $table) {
            $table->renameColumn('id','tour_packages_id');
        });
    }
}
