<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_disciplina', function (Blueprint $table) {
            $table->unsignedInteger('avaliacao_id');
            $table->unsignedInteger('disciplina_id');
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
        Schema::dropIfExists('avaliacao_disciplina');
    }
}
