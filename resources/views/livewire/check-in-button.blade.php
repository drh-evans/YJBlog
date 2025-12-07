<div class="flex flex-col items-center text-center">
    @if ($hasVisited)
        <p>Congratulations, you're one of @livewire('check-in-counter', ['stadiumId' => $stadium->id]) fans who have checked-in at the {{ $stadium->name }}.<br>
            Accidentally checked in? Remove it below. </p>
        <button wire:click="toggleCheckIn"
            class="mt-2 px-2 py-2 rounded-lg bg-red-500 hover:bg-red-400 font-semibold">Remove
            Visit</button>
    @else
        <p>You haven't visited this stadium yet. <br> Want to add it to your list of visited stadiums? </p>
        <button wire:click="toggleCheckIn"
            class="mt-2 px-2 py-2 rounded-lg bg-green-600 hover:bg-green-400 text-white text-md font-semibold">Check-in</button>
    @endif
</div>
