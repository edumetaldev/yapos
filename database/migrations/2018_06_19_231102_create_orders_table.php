<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('comments', 255)->nullable();
            $table->decimal('amount', 10, 3);
            $table->enum('type',['sale','receiving','return','lost']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('restrict');

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
        Schema::dropIfExists('orders');
    }
}
