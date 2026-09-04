<x-app-layout>
    <h2 class="text-xl font-semibold mb-4">My Tasks</h2>

    <!-- Progress Bar -->
    <div class="mb-6">
        <h3 class="text-lg font-semibold">Overall Progress</h3>
        <div class="w-full bg-gray-200 rounded-full h-4">
            <div class="bg-green-500 h-4 rounded-full" style="width: {{ $progress }}%"></div>
        </div>
        <p class="mt-2">{{ $completed }} of {{ $total }} tasks completed ({{ $progress }}%)</p>
    </div>

    <!-- Task Sections -->
    <h3 class="font-bold">Not Started</h3>
    <ul>
        @foreach($notStarted as $task)
            <li>{{ $task->title }}</li>
        @endforeach
    </ul>

    <h3 class="font-bold mt-4">In Progress</h3>
    <ul>
        @foreach($inProgress as $task)
            <li>{{ $task->title }}</li>
        @endforeach
    </ul>

    <h3 class="font-bold mt-4">Completed</h3>
    <ul>
        @foreach($done as $task)
            <li>{{ $task->title }}</li>
        @endforeach
    </ul>
    <ul>
    @foreach($tasks as $task)
        <li class="flex justify-between items-center mb-2">
            <span>{{ $task->title }} - {{ $task->status }}</span>

            <div class="space-x-2">
                <!-- Edit Button -->
                <a href="{{ route('tasks.edit', $task->id) }}" 
                   class="bg-blue-600 text-white px-3 py-1 rounded-md">
                   Edit
                </a>

                <!-- Delete Button -->
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-600 text-white px-3 py-1 rounded-md"
                            onclick="return confirm('Are you sure you want to delete this task?')">
                        Delete
                    </button>
                </form>
            </div>
        </li>
    @endforeach
</ul>

</x-app-layout>
