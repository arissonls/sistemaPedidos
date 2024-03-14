<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("orders", function (Blueprint $table) {
            $table->id();
            $table->bigInteger("client_id", false, true);
            $table->dateTime("dt_expected");
            $table->char("status");
            $table->float("rating");
            $table->char("paid");
            $table->dateTime("dt_payment")->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('orders');
    }
}
