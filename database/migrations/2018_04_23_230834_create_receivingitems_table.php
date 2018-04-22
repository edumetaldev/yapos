<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivingitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receiving_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->decimal('price',9, 2);
            $table->integer('quantity');
            $table->decimal('subtotal',9, 2);
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items')->onDelete('restrict');
            $table->foreign('receiving_id')->references('id')->on('receivings')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receivingitems');
    }
}
