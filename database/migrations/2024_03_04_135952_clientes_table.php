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
            $table->string('name',255);
            $table->date('birth')->nullable(true);
            $table->string('email');
            $table->string('cellphone',20);
            $table->string('estate');
            $table->string('city');
            $table->integer('zip_code');
            $table->string('district');
            $table->string('streat');
            $table->string('house');
            $table->timestamps();
            $table->softDeletes();

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
