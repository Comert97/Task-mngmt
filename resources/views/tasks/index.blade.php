<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Progress Bar -->
                @if($totalTasks > 0)
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold">Overall Progress</h2>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-green-500 h-4 rounded-full" style="width: {{ $progress }}%"></div>
                        </div>
                        <p class="mt-2">{{ $completedTasks }} of {{ $totalTasks }} tasks completed ({{ $progress }}%)</p>
                    </div>
                @endif

                <!-- Grouped Tasks -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- Not Started -->
                    @if($notStarted->count() > 0)
                        <div>
                            <h2 class="text-xl font-semibold mb-2">Not Started</h2>
                            <ul>
                                @foreach($notStarted as $task)
                                    <li class="flex justify-between items-center mb-2">
                                        <span>{{ $task->title }} (Priority: {{ $task->priority }})</span>
                                        <div class="space-x-2">
                                            <a href="{{ route('tasks.edit', $task->id) }}" 
                                               class="bg-blue-600 text-white px-3 py-1 rounded-md">Edit</a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-600 text-white px-3 py-1 rounded-md"
                                                        onclick="return confirm('Delete this task?')">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- In Progress -->
                    @if($inProgress->count() > 0)
                        <div>
                            <h2 class="text-xl font-semibold mb-2">In Progress</h2>
                            <ul>
                                @foreach($inProgress as $task)
                                    <li class="flex justify-between items-center mb-2">
                                        <span>{{ $task->title }} (Priority: {{ $task->priority }})</span>
                                        <div class="space-x-2">
                                            <a href="{{ route('tasks.edit', $task->id) }}" 
                                               class="bg-blue-600 text-white px-3 py-1 rounded-md">Edit</a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-600 text-white px-3 py-1 rounded-md"
                                                        onclick="return confirm('Delete this task?')">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Completed -->
                    @if($completed->count() > 0)
                        <div>
                            <h2 class="text-xl font-semibold mb-2">Completed</h2>
                            <ul>
                                @foreach($completed as $task)
                                    <li class="flex justify-between items-center mb-2">
                                        <span>{{ $task->title }} (Priority: {{ $task->priority }})</span>
                                        <div class="space-x-2">
                                            <a href="{{ route('tasks.edit', $task->id) }}" 
                                               class="bg-blue-600 text-white px-3 py-1 rounded-md">Edit</a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-600 text-white px-3 py-1 rounded-md"
                                                        onclick="return confirm('Delete this task?')">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
