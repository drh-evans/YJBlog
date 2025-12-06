@extends('layouts.yjblayout')

@section('title', 'Standings')

@section('content')
    <div>
        <h1>Fancy seeing the standings for a league? </h1>
        <p>Unfortunately we are running a free plan with our API provider, therefore can only offer standings from
            2021-2023.</p>

        @foreach ($leagues as $league)
            {{ $league['name'] }}
        @endforeach

        @livewire('standings-viewer', ['leagues' => $leagues, 'seasons' => $seasons])
    </div>
@endsection
