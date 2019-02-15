<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->decimal('quantity', 13, 3);
            $table->decimal('price', 13, 3);
            $table->decimal('discount', 13, 3);
            $table->decimal('subtotal', 13, 3);
            $table->string('line_text',50);
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('invoice_id')->references('id')->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_lines');
    }
}
