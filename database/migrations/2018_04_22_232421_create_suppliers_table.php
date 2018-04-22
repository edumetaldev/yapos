<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 100)->nullable();
            $table->string('name', 100);
            $table->string('email');
            $table->string('phone_number', 20)->nullable();
            $table->string('avatar', 255)->default('no-foto.png')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('state', 30)->nullable();
            $table->string('zip', 10)->nullable();
            $table->text('comments')->nullable();
            $table->string('account', 20)->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
