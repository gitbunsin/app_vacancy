<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('company_name')->nullable();
            $table->string('email')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('state')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('website_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('linkedIn_link')->nullable();
            $table->string('company_profile')->nullable();
            $table->string('company_logo')->nullable();
            // $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
