<div>
    <form wire:submit.prevent="findStandings">
        @csrf
        <select wire:model="league">
            @foreach ($leagues as $league)
                <option value="{{ $league['id'] }}">
                    {{ $league['name'] }}
                </option>
            @endforeach
        </select>
        <select wire:model="season">
            @foreach ($seasons as $season)
                <option value="{{ $season }}">
                    {{ $season }}
                </option>
            @endforeach
        </select>
    </form>
</div>
