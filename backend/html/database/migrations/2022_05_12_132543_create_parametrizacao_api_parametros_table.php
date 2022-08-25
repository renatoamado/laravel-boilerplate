<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrizacaoApiParametrosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametrizacao_api_parametros', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome');
            $table->string('apelido');
            $table->integer('parametrizacao_api_id')->unsigned();
            $table->timestamps();
            $table->foreign('parametrizacao_api_id')->references('id')->on('parametrizacao_apis') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parametrizacao_api_parametros');
    }
}
