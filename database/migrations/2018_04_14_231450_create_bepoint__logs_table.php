<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBepointLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bepoint_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->text('msg');
            $table->integer('bepoint');
            $table->integer('type');
            $table->integer('balance');
            $table->timestamp('added_on');

            $table->foreign('username')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bepoint_logs');
    }
}
