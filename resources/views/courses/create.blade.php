<x-app-layout>
    <div class="max-w-2xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4 text-slate-800 dark:text-white">Add Course</h1>
        <form method="POST" action="{{ route('courses.store') }}" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            <a href="{{ route('courses.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
</x-app-layout>