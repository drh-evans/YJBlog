<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Stadium;

class CheckInButton extends Component
{
    public $stadium;
    public $stadiumId;
    public $currentUser;
    // By default assume the user hasn't visited the stadium.
    public $hasVisited = false;

    public function mount(int $stadiumId) {
        $this->stadium = Stadium::findOrFail($stadiumId);
        $this->currentUser = auth()->user();
        $this->stadiumId = $stadiumId;
        $this->hasVisited = auth()->user()->stadiums->contains($this->stadiumId);
    }

    public function toggleCheckIn(){
        // If the user has already visited, give them the option to remove the check-in in-case it was a mistake from them.
        if ($this->hasVisited) {
            $this->currentUser->stadiums()->detach($this->stadiumId);
            $this->hasVisited = false;
        } else {
            $this->currentUser->stadiums()->attach($this->stadiumId);
            $this->hasVisited = true;
        }

        $this->dispatch('checkInClicked');
    }
    public function render()
    {
        return view('livewire.check-in-button');
    }
}
