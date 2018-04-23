<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username'); 
            $table->string('shop_id');          
            $table->string('name');
            $table->string('phone');
            $table->string('latlng');
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
        Schema::dropIfExists('branches');
    }
}
