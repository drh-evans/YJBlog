<?php

namespace App\Livewire;

use Livewire\Component;

class StandingsViewer extends Component
{

    // Data that the StandingsController has for the leagues and standings
    public $leagues;
    public $seasons;

    // Individual data.
    public $league;
    public $season;
    public $standings = [];

    public function mount($leagues, $seasons) {
        $this->leagues = $leagues;
        $this->seasons = $seasons;
    }

    public function findStandings () 
    {
        $validatedData = $this->validate([
            'league'=>'required|integer',
            'season'=>'required|integer',
        ]);

        $standingsService = app()->make('standings');
        $this->standings = $standingsService->getStandings($validatedData['league'],$validatedData['season']);
    }

    public function render()
    {
        return view('livewire.standings-viewer');
    }
}
