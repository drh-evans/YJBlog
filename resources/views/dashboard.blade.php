@extends('layouts.yjblayout')

@section('content')
    <div class="flex flex-col items-center">
        <h1 class="font-extrabold text-6xl"> Welcome to YJBLOG, {{ auth()->user()->name }}!</h1>
    </div>
@endsection
