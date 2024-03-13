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
            $table->bigInteger("id_order")->unsigned();
            $table->bigInteger("id_product")->unsigned();
            $table->integer("qtd")->unsigned();
            $table->float("unit_rating");
            $table->float("ful_rating");
            $table->timestamps();
            $table->foreign("id_order")->references("id")->on("orders");
            $table->foreign("id_product")->references("id")->on("products");
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
