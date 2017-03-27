<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('campo_resposta');
            $table->unsignedInteger('pergunta_id');
            $table->unsignedInteger('avaliacao_id');
            $table->unsignedInteger('disciplina_id');
            $table->timestamps();
            $table->foreign('pergunta_id')->references('id')->on('perguntas');
            $table->foreign('avaliacao_id')->references('id')->on('avaliacaos');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respostas');
    }
}
