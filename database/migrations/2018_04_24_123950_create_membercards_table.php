<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembercardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membercards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('shop_id');
            $table->string('name');
            $table->string('description');
            $table->string('imageBG');
            $table->string('colorHex1');
            $table->string('colorHex2');
            $table->string('bahtperpoint');

            $table->timestamps();

            $table->foreign('username')
            ->references('username')
            ->on('users');
            $table->foreign('shop_id')
            ->references('shops')
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
        Schema::dropIfExists('membercards');
    }
}
