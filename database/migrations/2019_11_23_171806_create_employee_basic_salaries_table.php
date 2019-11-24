<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeBasicSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_basic_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->integer('employee_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->integer('pay_grade_id')->unsigned()->nullable();
            $table->foreign('pay_grade_id')->references('id')->on('pay_grades')->onDelete('cascade');

            $table->integer('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');

            $table->integer('payperiod_id')->unsigned()->nullable();
            $table->foreign('payperiod_id')->references('id')->on('pay_periods')->onDelete('cascade');
            $table->string('basic_salary')->nullable();
            $table->string('salary_component')->nullable();
            $table->text('comments')->nullable();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_basic_salaries');
    }
}
