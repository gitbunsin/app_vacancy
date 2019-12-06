<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_vacancy', function (Blueprint $table) {
            $table->integer('candidate_id')->unsigned()->nullable();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->integer('vacancy_id')->unsigned()->nullable();
            $table->foreign('vacancy_id')->references('id')->on('vacancies')->onDelete('cascade');
            $table->string('status');
            $table->date('applied_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_vacancy');
    }
}
