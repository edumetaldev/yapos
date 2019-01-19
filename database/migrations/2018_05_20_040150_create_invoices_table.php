<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number',20);
            $table->integer('type_id')->unsigned(); //by_sell by_buy
            $table->string('to_name');
            $table->integer('ordertable_id')->unsigned();
            $table->string('ordertable_type',50); //sales - receivings
            $table->string('free_text',255);
            $table->decimal('taxes_1',13,2);
            $table->decimal('taxes_2',13,2);
            $table->decimal('amount',13,2);
            $table->decimal('total',13,2);
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
        Schema::dropIfExists('invoices');
    }
}
