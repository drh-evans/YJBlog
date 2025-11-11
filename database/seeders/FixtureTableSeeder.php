<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Fixture;
use App\Models\Player;

class FixtureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $e = new Fixture();
        $e->home_team_id = 1;
        $e->away_team_id = 2;
        $e->home_goals = 1;
        $e->away_goals = 0;
        $e->stadium_id = 1;
        $e->save();

        $e = new Fixture();
        $e->home_team_id = 1;
        $e->away_team_id = 3;
        $e->home_goals = 1;
        $e->away_goals = 1;
        $e->stadium_id = 1;
        $e->save();
        
        $e = new Fixture();
        $e->home_team_id = 3;
        $e->away_team_id = 1;
        $e->home_goals = 0;
        $e->away_goals = 1;
        $e->stadium_id = 3;
        $e->save();

        Fixture::factory(15)->has(Player::factory(22))->create();

    }
}
