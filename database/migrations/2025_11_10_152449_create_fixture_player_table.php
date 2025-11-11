<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fixture_player', function (Blueprint $table) {
            $table->primary(['fixture_id','player_id']);
            $table->bigInteger('fixture_id')->unsigned();
            $table->bigInteger('player_id')->unsigned();
            $table->timestamps();

            $table->foreign('fixture_id')->references('id')->on('fixtures')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('player_id')->references('id')->on('players')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixture_player');
    }
};
