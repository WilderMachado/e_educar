<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcaoRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcao_respostas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resposta_opcao');
            $table->unsignedInteger('pergunta_id');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('opcao_respostas');
    }
}
