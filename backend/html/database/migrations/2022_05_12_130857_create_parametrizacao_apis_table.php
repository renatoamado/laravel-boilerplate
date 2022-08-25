<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrizacaoApisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametrizacao_apis', function (Blueprint $table) {
            $table->id('id');
            $table->boolean('ativo');
            $table->string('nome');
            $table->integer('tipo'); // 1 - get, 2 - post
            $table->integer('cache_expiracao');
            $table->string('url');
            $table->string('rotulo')->nullable();
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
        Schema::drop('parametrizacao_apis');
    }
}
