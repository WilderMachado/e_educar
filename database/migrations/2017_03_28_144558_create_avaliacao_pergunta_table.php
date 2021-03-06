<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoPerguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_pergunta', function (Blueprint $table) {
            $table->unsignedInteger('avaliacao_id');
            $table->unsignedInteger('pergunta_id');
            $table->foreign('avaliacao_id')->references('id')->on('avaliacaos');
            $table->foreign('pergunta_id')->references('id')->on('perguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao_pergunta');
    }
}
