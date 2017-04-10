<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',10);
            $table->string('descricao',50);
            $table->string('nivel',20);
            $table->string('serie',20);
            $table->enum('turno', ['matutino','vespertino','noturno']);
            $table->unsignedInteger('ano_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ano_id')->references('id')->on('anos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turmas');
    }
}
