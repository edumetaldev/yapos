<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('upc_ean_isbn',90)->nulleable();
            $table->string('name',90);
            $table->string('description',90)->nullable();
            $table->string('avatar',90)->default('no-photo.png');
            $table->decimal('cost_price',15,2)->default(0);
            $table->decimal('selling_price',15,2)->default(0);
            $table->integer('quantity')->default(0);
            $table->tinyInteger('is_item_kit')->default(0);
            $table->tinyInteger('is_stockeable')->default(1);
            $table->decimal('reorder_level',15,2)->default(0);
            $table->decimal('receiving_quantity',15,2)->default(0);

            $table->integer('category_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
