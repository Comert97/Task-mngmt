<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold mb-6 text-indigo-700">📋 Task Dashboard</h1>

                <!-- Overall Progress -->
                @if($totalTasks > 0)
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold mb-2">Overall Progress</h2>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-green-500 h-4 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">
                            ✅ {{ $completedTasks }} of {{ $totalTasks }} tasks completed ({{ $progress }}%)
                        </p>
                    </div>
                @endif

                <!-- Task Groups -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- Not Started -->
                    <div class="bg-gray-50 p-4 rounded-lg shadow">
                        <h2 class="text-xl font-semibold mb-3">⏳ Not Started</h2>
                        @if($notStarted->count() > 0)
                            <ul>
                                @foreach($notStarted as $task)
                                    <li class="flex justify-between items-center mb-3 p-2 border rounded-md hover:bg-gray-100">
                                        <span>
                                            {{ $task->title }}
                                            <span class="ml-2 text-xs px-2 py-1 rounded-full bg-gray-200 text-gray-800">
                                                {{ ucfirst($task->priority) }}
                                            </span>
                                        </span>
                                        <div class="flex space-x-4"> <!-- increased spacing -->
                                            <a href="{{ route('tasks.edit', $task->id) }}" 
                                               class="bg-blue-600 text-white px-3 py-1 rounded-md flex items-center space-x-1 hover:bg-blue-700">
                                                ✏️ <span>Edit</span>
                                            </a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-600 text-white px-3 py-1 rounded-md flex items-center space-x-1 hover:bg-red-700 ml-2"
                                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                                    🗑️ <span>Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No tasks yet in this category 🚀</p>
                        @endif
                    </div>

                    <!-- In Progress -->
                    <div class="bg-yellow-50 p-4 rounded-lg shadow">
                        <h2 class="text-xl font-semibold mb-3">🚧 In Progress</h2>
                        @if($inProgress->count() > 0)
                            <ul>
                                @foreach($inProgress as $task)
                                    <li class="flex justify-between items-center mb-3 p-2 border rounded-md hover:bg-yellow-100">
                                        <span>
                                            {{ $task->title }}
                                            <span class="ml-2 text-xs px-2 py-1 rounded-full bg-yellow-200 text-yellow-800">
                                                {{ ucfirst($task->priority) }}
                                            </span>
                                        </span>
                                        <div class="flex space-x-4"> <!-- increased spacing -->
                                            <a href="{{ route('tasks.edit', $task->id) }}" 
                                               class="bg-blue-600 text-white px-3 py-1 rounded-md flex items-center space-x-1 hover:bg-blue-700">
                                                ✏️ <span>Edit</span>
                                            </a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-600 text-white px-3 py-1 rounded-md flex items-center space-x-1 hover:bg-red-700 ml-2"
                                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                                    🗑️ <span>Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No tasks in progress yet ⚡</p>
                        @endif
                    </div>

                    <!-- Completed -->
                    <div class="bg-green-50 p-4 rounded-lg shadow">
                        <h2 class="text-xl font-semibold mb-3">✅ Completed</h2>
                        @if($completed->count() > 0)
                            <ul>
                                @foreach($completed as $task)
                                    <li class="flex justify-between items-center mb-3 p-2 border rounded-md hover:bg-green-100">
                                        <span>
                                            {{ $task->title }}
                                            <span class="ml-2 text-xs px-2 py-1 rounded-full bg-green-200 text-green-800">
                                                {{ ucfirst($task->priority) }}
                                            </span>
                                        </span>
                                        <div class="flex space-x-4"> <!-- increased spacing -->
                                            <a href="{{ route('tasks.edit', $task->id) }}" 
                                               class="bg-blue-600 text-white px-3 py-1 rounded-md flex items-center space-x-1 hover:bg-blue-700">
                                                ✏️ <span>Edit</span>
                                            </a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-600 text-white px-3 py-1 rounded-md flex items-center space-x-1 hover:bg-red-700 ml-2"
                                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                                    🗑️ <span>Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No tasks completed yet 🎯</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
