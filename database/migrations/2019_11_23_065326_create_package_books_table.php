<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('user_name');
            $table->unsignedBigInteger('tour_packages_id');
            $table->longText('tour_packages_name');
            $table->unsignedBigInteger('package_price');
            $table->unsignedBigInteger('no_of_peoples');
            $table->dateTime('preferred_date');
            $table->unsignedBigInteger('phone_number');
            $table->longText('enquiries')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->dateTime('expiration_date');
            $table->tinyInteger('approved')->nullable();
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
        Schema::dropIfExists('package_books');
    }
}
