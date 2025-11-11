<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stadium;

class StadiumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $s = new Stadium();
        $s->name="Swansea.com Stadium";
        $s->capacity= 21088;
        $s->year_built=2005;
        $s->city="Swansea";
        $s->country="Wales";
        $s->save();
        $s->users()->attach([1,2]);

        $s = new Stadium();
        $s->name="Kenilworth Road";
        $s->capacity=12000;
        $s->year_built= 1905;
        $s->city="Luton";
        $s->country="England";
        $s->save();
        $s->users()->attach([1,2]);

        Stadium::factory(20)->create();
    }
}
