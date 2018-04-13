<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVochersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner');
            $table->integer('status')->default(0);
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('amount');
            $table->integer('bePoint');
            $table->integer('reception')->default(0);
            $table->string('voucherFormat');
            $table->timestamps();

            $table->foreign('owner')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
