<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->integer('account_id_destiny')->unsigned();
            $table->integer('account_id_origin')->unsigned();
            $table->integer('transaction_type_id')->unsigned();
            $table->string('comments',200);
            $table->decimal('amount', 10, 3);
            $table->decimal('current_balance', 10, 3);
            $table->enum('debit_credit',['debit','credit']);
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
        Schema::dropIfExists('transactions');
    }
}
