<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            //Employment Status
            $table->integer('emp_status')->unsigned()->nullable();
            $table->foreign('emp_status')->references('id')->on('employment_statuses')->onDelete('cascade');

            //job Title
            $table->integer('job_title_id')->unsigned()->nullable();
            $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('cascade');

            //job Category
            $table->integer('job_category_id')->unsigned()->nullable();
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');

            //job Category
            $table->integer('nationality_id')->unsigned()->nullable();
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');

            //job Category
            $table->integer('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');


            $table->integer('sub_unit_id')->unsigned()->nullable();
            $table->foreign('sub_unit_id')->references('id')->on('sub_units')->onDelete('cascade');

            $table->string('employee_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('birthday')->nullable();
            $table->enum('gender', ['male','female'])->nullable();
            $table->enum('marital_status', ['single', 'married'])->nullable();
            $table->string('street1')->nullable();
            $table->string('street2')->nullable();
            // $table->string('city_code')->nullable();
            // $table->string('country_code')->nullable();
            $table->integer('city_code')->unsigned()->nullable();
            $table->foreign('city_code')->references('id')->on('cities')->onDelete('cascade');
            $table->integer('country_code')->unsigned()->nullable();
            $table->foreign('country_code')->references('id')->on('countries')->onDelete('cascade');

            $table->string('zip_code')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('work_telephone')->nullable();
            $table->string('work_email')->nullable();
            $table->string('other_email')->nullable();
            $table->string('other_id')->nullable();
            $table->string('joined_date')->nullable();
            $table->string('photo')->nullable();
            $table->string('custom1')->nullable();
            $table->string('custom2')->nullable();
            $table->string('custom3')->nullable();
            $table->string('custom4')->nullable();
            $table->string('custom5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
