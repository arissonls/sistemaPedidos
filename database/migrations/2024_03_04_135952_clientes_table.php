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
            $table->string('email');
            $table->integer('cellphone');
            $table->string('estate');
            $table->string('city');
            $table->integer('zip_code');
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
