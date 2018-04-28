<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userVoucher', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voucher_id');
            $table->string('shop_id');
            $table->string('status');
            $table->string('username');
            $table->string('voucher_code');
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
        Schema::dropIfExists('userVoucher');
    }
}
