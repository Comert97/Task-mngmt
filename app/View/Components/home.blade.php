<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Welcome!</h1>
    <p class="mb-6">Create your first task to get started.</p>

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Task title" required class="border rounded p-2 w-full">
        <select name="priority" class="border rounded p-2 w-full">
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
        <input type="date" name="start_date" required class="border rounded p-2 w-full">
        <input type="date" name="end_date" required class="border rounded p-2 w-full">

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">
            Save Task
        </button>
    </form>
</x-app-layout>
