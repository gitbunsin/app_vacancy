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

            // $table->integer('payment_id')->unsigned()->nullable();
            // $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');

            $table->integer('employee_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('job_categories')->onDelete('cascade');

            $table->integer('job_title_id')->unsigned()->nullable();
            $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('cascade');

            $table->integer('job_type_id')->unsigned()->nullable();
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');

            $table->integer('province_id')->unsigned()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->string('vacancy_name')->nullable();

            $table->text('job_description')->nullable();
            $table->text('job_requirement')->nullable();
            $table->integer('no_of_position')->nullable();
            $table->string('maxSalary')->nullable();
            $table->string('minSalary')->nullable();
            $table->enum('salary_cycle', ['monthly','yearly','weekly', 'daily', 'hourly'])->nullable();
            $table->enum('exp_level', ['mid', 'entry', 'senior'])->nullable();
            $table->string('gender')->nullable();
            $table->string('negotiation')->nullable();
            $table->string('status')->nullable();
            $table->string('public_in_feed')->nullable();
            $table->string('closingDate')->nullable();
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
