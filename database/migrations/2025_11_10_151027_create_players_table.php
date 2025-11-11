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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nationality');
            $table->string('position');
            $table->integer('shirt_number')->unsigned();
            $table->integer('appearances')->unsigned();
            $table->integer('year_joined')->unsigned();
            $table->bigInteger("club_id")->unsigned();
            $table->timestamps();

            $table->foreign("club_id")->references("id")->on("clubs")
            ->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
