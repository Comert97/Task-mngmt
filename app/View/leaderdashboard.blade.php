<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leaderboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Weekly Winner Banner -->
            @if($users->count())
                <div class="mb-6 bg-green-100 border border-green-300 text-green-800 p-4 rounded-lg">
                    🎉 Winner of this week is 
                    <strong>{{ $users->first()->name }}</strong>
                    with <strong>{{ $users->first()->tasks_count }}</strong> completed tasks!
                </div>
            @endif

            <!-- Current Week Leaderboard -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-8">
                <h3 class="text-lg font-bold mb-4">Current Week Rankings</h3>

                @if($users->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Rank</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">User</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Tasks Completed</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($users as $index => $user)
                                <tr>
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->tasks_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No tasks completed this week yet.</p>
                @endif
            </div>

            <!-- Past Weekly Results -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Past Weekly Winners</h3>

                @if($weeklyResults->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Week Start</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Winner</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Tasks Completed</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($weeklyResults as $result)
                                <tr>
                                    <td class="px-4 py-2">{{ $result->week_start->format('M d, Y') }}</td>
                                    <td class="px-4 py-2">{{ $result->user->name }}</td>
                                    <td class="px-4 py-2">{{ $result->tasks_completed }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No past weekly results recorded yet.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
