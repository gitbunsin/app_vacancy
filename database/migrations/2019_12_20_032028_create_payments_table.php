<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->integer('package_id')->unsigned()->nullable();
            $table->foreign('package_id')->references('id')->on('pricings')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->enum('status', ['initial','pending','success','failed','declined','dispute'])->default('initial')->nullable();
            $table->string('currency')->nullable();
            //Bank Payment Options
            $table->string('bank_swift_code')->nullable();
            $table->string('account_number')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('branch_address')->nullable();
            $table->string('account_name')->nullable();
            $table->string('iban')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
