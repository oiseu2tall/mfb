<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('card_number')->length(10);
            $table->string('image_name', 100)->unique();
            $table->string('first_name', 100);
            $table->string('middle_name', 100);
            $table->string('surname', 100);
            $table->string('aka', 100)->nullable();
            $table->text('address', 555);
            $table->string('phone', 20);
            $table->string('email', 50)->unique()->nullable();
            $table->date('dateOfBirth');
            $table->string('guarantor_name', 100);
            $table->text('guarantor_address', 255);
            $table->string('guarantor_phone', 20);
            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')
            ->references('id')->on('groups');

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
        Schema::dropIfExists('customers');
    }
}
