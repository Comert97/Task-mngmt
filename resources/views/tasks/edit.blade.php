<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-700 leading-tight">
            ✏️ Edit Task
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-gray-700 font-medium mb-2">Task Title</label>
                        <input type="text" id="title" name="title" value="{{ $task->title }}" required
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                    </div>

                    <!-- Priority -->
                    <div>
                        <label for="priority" class="block text-gray-700 font-medium mb-2">Priority</label>
                        <select id="priority" name="priority"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                            <option value="easy" {{ $task->priority == 'easy' ? 'selected' : '' }}>🟢 Easy</option>
                            <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>🟡 Medium</option>
                            <option value="hard" {{ $task->priority == 'hard' ? 'selected' : '' }}>🔴 Hard</option>
                        </select>
                    </div>

                    <!-- Dates -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="start_date" class="block text-gray-700 font-medium mb-2">Start Date</label>
                            <input type="date" id="start_date" name="start_date" value="{{ $task->start_date }}" required
                                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                        </div>
                        <div>
                            <label for="end_date" class="block text-gray-700 font-medium mb-2">End Date</label>
                            <input type="date" id="end_date" name="end_date" value="{{ $task->end_date }}" required
                                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between items-center">
                        <a href="{{ route('tasks.index') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded-md shadow hover:bg-gray-600 transition">
                            Cancel
                        </a>
                        <button type="submit"
                                class="bg-green-600 text-white px-6 py-2 rounded-md shadow hover:bg-green-700 transition">
                            ✅ Update Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
