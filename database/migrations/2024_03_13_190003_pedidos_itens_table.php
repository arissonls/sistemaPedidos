<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidosItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("orders_itens", function (Blueprint $table) {
            $table->id();
            $table->bigInteger("order_id")->unsigned();
            $table->bigInteger("product_id")->unsigned();
            $table->integer("qtd")->unsigned();
            $table->float("unit_rating");
            $table->float("ful_rating");
            $table->float("discount");
            $table->timestamps();
            $table->foreign("order_id")->references("id")->on("orders");
            $table->foreign("product_id")->references("id")->on("products");
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
        Schema::drop('orders_itens');
    }
}
