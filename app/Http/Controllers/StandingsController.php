<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StandingsController extends Controller
{

    // Competition ID's as defined on the API docs and their league names.
    private const LEAGUES = [
        ['id' => 39, 'name'=>'Premier League'],
        ['id'=> 40, 'name'=>'EFL Championship'],
        ['id'=> 41, 'name'=>'EFL League One'],
        ['id'=> 42, 'name'=>'EFL League Two'],
        ['id'=> 42, 'name'=>'National League'],
        ['id'=> 61, 'name'=>'Ligue 1'],
        ['id'=> 78, 'name'=>'Bundesliga'], 
        ['id'=> 135, 'name'=>'Serie A'],        
        ['id'=> 140, 'name'=>'La Liga'],
    ];

    // API only allows these seasons on a free plan, cannot use current or previous season.
    private const SEASONS = [2023, 2022, 2021];

    // an index view such that users can make selections.
    public function index () {
         return view('standings.index', [
            'leagues'=> self::LEAGUES,
            'seasons'=>self::SEASONS,
        ]);
    }
}
