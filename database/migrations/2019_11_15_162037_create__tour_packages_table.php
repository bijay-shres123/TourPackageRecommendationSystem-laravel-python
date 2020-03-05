<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_tour_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('link')->nullable;
            $table->string('image');
            $table->string('meal_inclusion');
            $table->string('transport_facilities');
            $table->string('Days_Nights');
            $table->dateTime('date');
            $table->longText('Inclusion_Exclusion_list');
            $table->longText('Detailed_itinerary');
            $table->integer('package_price');
            $table->unsignedBigInteger('added_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_tour_packages');
    }
}
