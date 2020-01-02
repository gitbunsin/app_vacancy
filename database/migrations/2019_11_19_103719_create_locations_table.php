<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('country_code')->unsigned()->nullable();
            $table->foreign('country_code')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('province_code')->unsigned()->nullable();
            $table->foreign('province_code')->references('id')->on('provinces')->onDelete('cascade');
            $table->integer('city_code')->unsigned()->nullable();
            $table->foreign('city_code')->references('id')->on('cities')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
