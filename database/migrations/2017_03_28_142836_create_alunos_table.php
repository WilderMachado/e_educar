<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricula', 10)->unique();
            $table->string('nome', 60);
            $table->string('email', 100)->unique();
            $table->string('foto');
            $table->unsignedInteger('turma_id');
            $table->unsignedInteger('responsavel_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('turma_id')->references('id')->on('turmas');
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
        Schema::dropIfExists('alunos');
    }
}
