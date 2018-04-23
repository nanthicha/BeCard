<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_id');          
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('branch_id');
            $table->timestamps();

            $table->foreign('shop_id')
            ->references('shops')
            ->on('id');
            $table->foreign('branch_id')
            ->references('branches')
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
        Schema::dropIfExists('cashiers');
    }
}
