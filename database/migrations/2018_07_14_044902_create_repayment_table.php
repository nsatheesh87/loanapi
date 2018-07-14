<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repayment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loanId')->unsigned();
            $table->float('paidAmount', 8, 2);
            $table->timestamps();
            $table->foreign('loanId')->references('id')->on('loan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repayment');
    }
}
