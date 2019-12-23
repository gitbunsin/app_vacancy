<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_id')->unsigned()->nullable();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->integer('vacancy_id')->unsigned()->nullable();
            $table->foreign('vacancy_id')->references('id')->on('vacancies')->onDelete('cascade');
            $table->string('interview_name')->nullable();
            $table->string('interview_date')->nullable();
            $table->string('interview_time')->nullable();
            $table->string('status')->nullable();
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}
