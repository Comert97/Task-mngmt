<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-teal-700 leading-tight">
            📝 Task Manager
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-white to-gray-50 shadow-lg rounded-xl p-8 border border-gray-200">

                <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Task Title</label>
                        <input type="text" id="title" name="title"
                               class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 p-3"
                               placeholder="Enter task name..." required>
                    </div>

                   
                    <div>
                        <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                        <textarea id="description" name="description" rows="3"
                                  class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 p-3"
                                  placeholder="Brief details about the task..."></textarea>
                    </div>

                    <!-- Priority -->
                    <div>
                        <label for="priority" class="block text-gray-700 font-semibold mb-2">Priority</label>
                        <select id="priority" name="priority"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 p-3">
                            <option value="easy">🟢 Easy</option>
                            <option value="medium">🟡 Medium</option>
                            <option value="hard">🔴 Hard</option>
                        </select>
                    </div>

                    <!-- Dates -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block text-gray-700 font-semibold mb-2">Start Date</label>
                            <input type="date" id="start_date" name="start_date"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 p-3" required>
                        </div>
                        <div>
                            <label for="end_date" class="block text-gray-700 font-semibold mb-2">End Date</label>
                            <input type="date" id="end_date" name="end_date"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 p-3" required>
                        </div>
                    </div>

                   
                    
                    <div class="flex justify-end">
                       <button class="bg-green-600 text-white px-6 py-2 rounded-md shadow hover:bg-green-700 transition">
                          ➕ Add Task
                                </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
