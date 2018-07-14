<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('customerId')->unsigned();
            $table->integer('duration');
            $table->integer('repayment_frequency');
            $table->integer('interest_rate');
            $table->float('arrangement_fee', 8, 2);
            $table->float('amount', 8, 2);
            $table->float('install_amount', 8, 2);
            $table->enum('status', ['in-progress', 'completed'])->default('in-progress');
            $table->timestamps();
            $table->foreign('customerId')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan');
    }
}
