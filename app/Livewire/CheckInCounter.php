<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

use App\Models\Stadium;

class CheckInCounter extends Component
{
    public $stadium;
    public $totalVisits;

    public function mount(int $stadiumId) {
        $this->stadium = Stadium::findOrFail($stadiumId);
        $this->totalVisits = $this->stadium->users()->count();
    }

    #[On('checkInClicked')]
    public function refreshCheckIns() {
        $this->totalVisits = $this->stadium->users()->count();
    }

    public function render()
    {
        return view('livewire.check-in-counter');
    }
}
