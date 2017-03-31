<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisoTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aviso_turma', function (Blueprint $table) {
            $table->unsignedInteger('aviso_id');
            $table->unsignedInteger('turma_id');
            $table->primary(['aviso_id','turma_id']);
            $table->foreign('aviso_id')->references('id')->on('avisos');
            $table->foreign('turma_id')->references('id')->on('turmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aviso_turma');
    }
}
