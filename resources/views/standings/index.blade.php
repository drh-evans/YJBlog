@extends('layouts.yjblayout')

@section('title', 'Standings')

@section('content')
    <div class="mt-4 flex flex-col items-center">
        <h1 class="text-xl">Fancy seeing the standings for a league? </h1>
        <p class="mt-2">
            Currently we offer the following leagues:
            @foreach ($leagues as $league)
                {{ $league['name'] }},
            @endforeach
            <br>
            Unfortunately we are running a free plan with our API provider, therefore can only offer standings from
            2021-2023.
            <br>
            Below, GF stands for "Goals For", GA for "Goals Against", and GD for "Goal Difference".
        </p>
    </div>

    <div class="mt-4 mb-6 flex flex-row justify-center">
        @livewire('standings-viewer', ['leagues' => $leagues, 'seasons' => $seasons])
    </div>
@endsection
