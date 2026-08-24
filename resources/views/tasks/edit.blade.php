<x-app-layout>
    <h2 class="text-xl font-semibold mb-4">Edit Task</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $task->title }}" required class="border rounded p-2 w-full">

        <select name="priority" class="border rounded p-2 w-full">
            <option value="easy" {{ $task->priority == 'easy' ? 'selected' : '' }}>Easy</option>
            <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="hard" {{ $task->priority == 'hard' ? 'selected' : '' }}>Hard</option>
        </select>

        <input type="date" name="start_date" value="{{ $task->start_date }}" required class="border rounded p-2 w-full">
        <input type="date" name="end_date" value="{{ $task->end_date }}" required class="border rounded p-2 w-full">

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">
            Update Task
        </button>
    </form>
</x-app-layout>
