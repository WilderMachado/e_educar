<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mensagem');
            $table->unsignedInteger('remetente_id');
            $table->unsignedInteger('destinatario_id')->nullable();
            $table->timestamp('data_hora');
            $table->foreign('remetente_id')->references('id')->on('users');
            $table->foreign('destinatario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
