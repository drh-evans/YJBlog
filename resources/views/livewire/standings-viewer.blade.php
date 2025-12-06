<div class="flex flex-col items-center">
    @include('components.custom.error')

    <form wire:submit.prevent="findStandings">
        @csrf
        <select wire:model="league">
            <option value="">Select League...</option>
            @foreach ($leagues as $league)
                <option value="{{ $league['id'] }}">
                    {{ $league['name'] }}
                </option>
            @endforeach
        </select>
        <select wire:model="season">
            <option value="">Select Season...</option>
            @foreach ($seasons as $season)
                <option value="{{ $season }}">
                    {{ $season }}
                </option>
            @endforeach
        </select>

        <button type="findStandings"
            class="ml-2 px-2 py-2 border-[#EF8354]/90 bg-[#EF8354] text-slate-800 rounded-lg text-md font-semibold hover:underline hover:bg-[#d58867]">See
            Standings</button>
    </form>

    <div class="text-center mt-4">
        <table class="table-auto border-collapse border border-gray-400">
            <thead>
                <tr class="bg-slate-400">
                    <th class="p-4">Position</th>
                    <th class="p-4">Team</th>
                    <th class="p-4">Played</th>
                    <th class="p-4">Won</th>
                    <th class="p-4">Drawn</th>
                    <th class="p-4">Lost</th>
                    <th class="p-4">GF</th>
                    <th class="p-4">GA</th>
                    <th class="p-4">GD</th>
                    <th class="p-4">Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($standings as $position)
                    <tr>
                        <td class="p-4 border border-slate-500">{{ $position['rank'] }}</td>
                        <td class="p-4 border border-gray-500">{{ $position['team']['name'] }}</td>
                        <td class="p-4 border border-gray-500">{{ $position['all']['played'] }}</td>
                        <td class="p-4 border border-gray-500">{{ $position['all']['win'] }}</td>
                        <td class="p-4 border border-gray-500">{{ $position['all']['draw'] }}</td>
                        <td class="p-4 border border-gray-500">{{ $position['all']['lose'] }}</td>
                        <td class="p-4 border border-gray-500">{{ $position['all']['goals']['for'] }}</td>
                        <td class="p-4 border border-gray-500">{{ $position['all']['goals']['against'] }}</td>
                        <td class="p-4 border border-gray-500">{{ $position['goalsDiff'] }}</td>
                        <td class="p-4 border border-gray-500"> {{ $position['points'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
