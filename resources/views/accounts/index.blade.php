@extends('layouts.yjblayout')

@section('title', 'Users')

@section('content')
    @foreach ($accounts as $account)
        <a href="{{ route('accounts.show', ['id' => $account->id]) }}">
            {{ $account->display_name }} <br></a>
    @endforeach
@endsection
