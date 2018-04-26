<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->integer('card_id');
            $table->integer('point')->default(0);;
            $table->timestamps();

            $table->foreign('username')
            ->references('username')
            ->on('users');
            $table->foreign('card_id')
            ->references('membercards')
            ->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_cards');
    }
}
