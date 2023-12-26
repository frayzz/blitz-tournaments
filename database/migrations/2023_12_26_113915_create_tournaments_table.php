<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('game_type');
            $table->integer('number_of_players');
            $table->unsignedBigInteger('creator_id'); // ID первого игрока (создателя)
            $table->unsignedBigInteger('opponent_id')->nullable(); // ID второго игрока (оппонента)
            $table->string('status')->default('Поиск игроков'); // Статус турнира
            $table->timestamps();

            // Внешние ключи и связи
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('opponent_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
}
