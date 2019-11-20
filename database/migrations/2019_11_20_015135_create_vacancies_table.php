<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('job_categories')->onDelete('cascade');

            $table->integer('job_type_id')->unsigned()->nullable();
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');

            $table->integer('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->string('vacancy_name')->nullable();

            $table->text('job_description')->nullable();
            $table->integer('no_of_position')->nullable();
            $table->string('offer_salary')->nullable();
            $table->string('gender')->nullable();
            $table->string('industry')->nullable();
            $table->string('experience')->nullable();
            $table->string('qualification')->nullable();
            $table->string('career_level')->nullable();
            $table->integer('status')->nullable();
            $table->string('public_in_feed')->nullable();
            $table->date('closingDate')->nullable();
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
        Schema::dropIfExists('vacancies');
    }
}
