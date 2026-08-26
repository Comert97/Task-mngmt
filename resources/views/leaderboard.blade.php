<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leaderboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Weekly Results</h1>

                @if(isset($weeklyResults) && $weeklyResults->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">User</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Tasks Completed</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($weeklyResults as $result)
                                <tr>
                                    <td class="px-4 py-2">{{ $result->user->name }}</td>
                                    <td class="px-4 py-2">{{ $result->tasks_completed }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No results yet.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
