<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use Livewire\Attributes\On; 


use App\Models\Stadium;

class CheckedInUsers extends Component
{
    use WithPagination;

    public $stadium;
    public function mount(int $stadiumId) {
        $this->stadium = Stadium::findOrFail($stadiumId);
    }

    #[On('checkInClicked')]
    public function refreshCheckedInUsers() {
        // refresh the page after a new user is added so that the paginator works.
        $this->resetPage();
    }

    public function render()
    {
        $checkedInUsers = $this->stadium->users()->paginate(5);
        return view('livewire.checked-in-users', ['checkedInUsers' => $checkedInUsers]);
    }
}
