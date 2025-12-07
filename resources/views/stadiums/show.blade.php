@extends('layouts.yjblayout')

@section('title')

@section('content')
    <div class="mt-4">
        <a href="{{ route('stadiums.index') }}"
            class="ml-2 px-2 py-2 border-[#EF8354]/90 bg-[#EF8354] text-slate-800 rounded-lg text-md font-semibold hover:underline hover:bg-[#d58867]">Return</a>
        <div class="flex flex-col items-center">
            <div class=" text-center mt-4 w-[700px] border border-black rounded-md bg-[#BFC0C0]/20 shadow-md p-3">
                <p class="text-3xl font-bold"> {{ $stadium->name }}</p>
                <p class="text-2xl font-semibold"> {{ $stadium->city }}, {{ $stadium->country }}</p>
                <p class="text-lg">Capacity: {{ $stadium->capacity }} seats</p>
                <p class="text-md">Total Check-ins: @livewire('check-in-counter', ['stadiumId' => $stadium->id])</p>
            </div>
        </div>
        <div class="mt-4">
            @if ($visited)
                @livewire('check-in-button', ['stadiumId' => $stadium->id])
            @else
                @livewire('check-in-button', ['stadiumId' => $stadium->id])
            @endif
        </div>
    </div>
@endsection
