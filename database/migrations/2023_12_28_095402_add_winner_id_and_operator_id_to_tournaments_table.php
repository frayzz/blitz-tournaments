<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWinnerIdAndOperatorIdToTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->unsignedBigInteger('winner_id')->nullable()->after('status'); // ID победителя
            $table->unsignedBigInteger('operator_id')->nullable()->after('winner_id'); // ID судьи (оператора)

            // Внешние ключи и связи
            $table->foreign('winner_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('operator_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->dropForeign(['winner_id']);
            $table->dropForeign(['operator_id']);
            $table->dropColumn(['winner_id', 'operator_id']);
        });
    }
}
