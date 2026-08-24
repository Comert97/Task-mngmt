<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <!-- Task Creation Form -->
    <form action="{{ route('tasks.store') }}" method="POST" class="mb-8 bg-white p-6 rounded-lg shadow-md">
        @csrf
        <h2 class="text-xl font-semibold mb-4">Create New Task</h2>

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Task Title</label>
            <input type="text" id="title" name="title" class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="priority" class="block text-gray-700">Priority</label>
            <select id="priority" name="priority" class="w-full border-gray-300 rounded-md shadow-sm">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Start Date</label>
            <input type="date" id="start_date" name="start_date" class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-gray-700">End Date</label>
            <input type="date" id="end_date" name="end_date" class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            Add Task
        </button>
    </form>

  <div class="mt-6">
        <a href="{{ route('dashboard') }}" 
           class="bg-indigo-600 text-white px-4 py-2 rounded-md">
            View My Tasks
        </a>
    </div>
</x-app-layout>
