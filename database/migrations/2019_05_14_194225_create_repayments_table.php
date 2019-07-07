<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repayments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('installment', 10, 2);
            $table->decimal('savings', 10, 2)->default(0);
            $table->decimal('extra_savings', 10, 2)->default(0);
            $table->date('payment_date');
            $table->decimal('balance', 10, 2)->nullable();

            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('loan_id')->unsigned();
            $table->bigInteger('credit_id')->unsigned();

            $table->foreign('loan_id')
            ->references('id')->on('loans');
            $table->foreign('customer_id')
            ->references('id')->on('customers');
             $table->foreign('credit_id')
            ->references('id')->on('credits');

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
        Schema::dropIfExists('repayments');
    }
}
