<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\Player;


class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new Club();
        $c->name="Swansea City";
        $c->division="EFL Championship";
        $c->year_founded=1912;
        $c->save();

        Club::factory(20)->has(Player::factory(25))->create();
        
    }
}