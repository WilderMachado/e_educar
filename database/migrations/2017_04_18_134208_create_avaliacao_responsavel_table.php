<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoResponsavelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_responsavel', function (Blueprint $table) {
            $table->unsignedInteger('avaliacao_id');
            $table->unsignedInteger('responsavel_id');
            $table->foreign('avaliacao_id')->references('id')->on('avaliacaos');
            $table->foreign('responsavel_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao_responsavel');
    }
}
