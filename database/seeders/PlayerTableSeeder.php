<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Club;
use App\Models\Stadium;


class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = new Player();
        $p->name = "Lawrence Vigouroux";
        $p->nationality="Chilean";
        $p->position="Goalkeeper";
        $p->shirt_number=22;
        $p->appearances=54;
        $p->year_joined=2024;
        $p->club_id= 1;
        $p->save();

        $p = new Player();
        $p->name = "Ben Cabango";
        $p->nationality="Welsh";
        $p->position="Defender";
        $p->shirt_number=5;
        $p->appearances=223;
        $p->year_joined=2014;
        $p->club_id= 1;
        $p->save();

        Player::factory(15)->create();

    }
}