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
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('home_team_id')->unsigned();
            $table->bigInteger('away_team_id')->unsigned();
            $table->integer('home_goals')->unsigned();
            $table->integer('away_goals')->unsigned();
            $table->bigInteger('stadium_id')->unsigned();
            $table->timestamps();

            $table->foreign('home_team_id')->references('id')->on('clubs')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('away_team_id')->references('id')->on('clubs')
            ->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreign('stadium_id')->references('id')->on('stadiums')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};
