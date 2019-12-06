<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_id')->unsigned()->nullable();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->string('file_name')->nullable();
            $table->string('file_type')->nullable();
            $table->string('file_content')->nullable();
            $table->string('attachment_type')->nullable();
            $table->string('file_size')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_attachments');
    }
}
