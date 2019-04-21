<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->length(100);
            $table->text('description')->length(999);
            $table->integer('duration')->length(4);//in weeks e.g 4, 12, 24 
            $table->decimal('principal' 10,3);//amount loaned
            $table->decimal('interest' 10, 3)->between(0.001,0.999);//profit to mfb
            $table->decimal('total_savings', 10, 3)->default(0);
            /**customers weekly remittance sum to equal complete principal + interest at the end of the loan duration. collection must be ensured by mfb*/
            $table->decimal('weekly_remittance', 10, 3);
            $table->decimal('weekly_savings', 10, 3)->default(0);/**sum to equal total savings at the end of the loan duration*/
            $table->decimal('interest_rate', 10, 3);

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
        Schema::dropIfExists('loans');
    }
}
