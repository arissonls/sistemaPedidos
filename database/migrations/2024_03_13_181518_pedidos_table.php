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
            $table->bigInteger("id_client", false, true);
            $table->dateTime("dt_expected");
            $table->float("rating");
            $table->char("paid");
            $table->dateTime("dt_payment");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_client')->references('id')->on('clients');
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
