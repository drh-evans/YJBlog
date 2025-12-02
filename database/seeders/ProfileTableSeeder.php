<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = new Profile();
        $p->user_id = 1;
        $p->display_name ="Rhys";
        $p->description ="Big football fan";
        $p->favourite_club_id=1;
        $p->save();

        
        Profile::factory(10)->create();
        
    }
}
