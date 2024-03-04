<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user',false, true);
            $table->date('birth');
            $table->integer('cel_phone');
            $table->string('estate');
            $table->string('city');
            $table->string('distrit');
            $table->string('streat');
            $table->string('house');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');

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
        Schema::drop('clients');
    }
}
