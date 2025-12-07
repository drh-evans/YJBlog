@extends('layouts.yjblayout')

@section('title', 'Stadiums')

@section('content')
    <div class="flex flex-col items-center">
        <div class="text-center mt-4">
            <table class="table-auto border-collapse border border-gray-400">
                <thead>
                    <tr class="bg-slate-400">
                        <th class="p-4">Name</th>
                        <th class="p-4">Location</th>
                        <th class="p-4">Location</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stadiums as $stadium)
                        <tr>
                            <td class="p-4 border border-slate-500">{{ $stadium->name }}</td>
                            <td class="p-4 border border-gray-500">{{ $stadium->city }}, {{ $stadium->country }}</td>
                            <td class="p-4 border border-gray-500"><a
                                    href="{{ route('stadium.show', ['id' => $stadium->id]) }}"
                                    class="hover:underline hover:text-[#EF8354]">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
