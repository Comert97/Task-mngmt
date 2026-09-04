<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leaderboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">🏆 Task Leaderboard</h1>

                @if($users->count())
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left">Rank</th>
                                <th class="px-4 py-2 text-left">User</th>
                                <th class="px-4 py-2 text-left">Tasks Completed</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($users as $index => $user)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-2 font-semibold">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->tasks_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No tasks completed yet in the last 15 minutes ⏳</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
