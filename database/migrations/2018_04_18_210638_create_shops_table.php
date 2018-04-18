<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('username');
            $table->string('logo');
            $table->string('imgCover');
            $table->string('time');
            $table->enum('type',[
                'beauty','clothes','drink','food','jewellery','service'
              ]);
            $table->string('latlng');
            $table->enum('package', ['sliver','gold']);
            $table->timestamps();
            $table->foreign('username')
                  ->references('username')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
