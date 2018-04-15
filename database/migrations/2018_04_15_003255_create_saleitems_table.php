<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->integer('sale_id')->unsigned();
            $table->integer('quantity');
            $table->decimal('price', 13, 3);
            $table->decimal('subtotal', 13, 3);
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('sale_id')->references('id')->on('sales');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saleitems');
    }
}
