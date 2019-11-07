<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyPayGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_pay_grade', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->integer('pay_grade_id')->unsigned()->nullable();
            $table->foreign('pay_grade_id')->references('id')->on('pay_grades')->onDelete('cascade');

            $table->decimal('max_salary');
            $table->decimal('min_salary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_pay_grade');
    }
}
