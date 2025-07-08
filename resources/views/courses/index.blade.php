<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-7xl mx-auto">
        <!-- Add your content here -->
        <div class="mb-4">
            <form method="GET" action="{{ route('courses.index') }}">
                <input type="text" name="search" placeholder="Search courses..." value="{{ request('search') }}" class="border p-2 rounded">
                <button class="bg-blue-500 text-white p-2 rounded">Search</button>
                @if(in_array(auth()->user()->role, ['admin', 'staff']))
                <a href="{{ route('courses.create') }}" class="bg-green-500 text-white p-2 rounded ml-2">Add New</a>
                <a href="{{ route('courses.export.all') }}" class="bg-red-500 text-white p-2 rounded ml-2">Export All PDF</a>
                @endif
            </form>
        </div>

        <table class="w-full border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 border">Title</th>
                    <th class="p-2 border">Description</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td class="p-2 border">{{ $course->title }}</td>
                    <td class="p-2 border">{{ $course->description }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button class="text-red-500 ml-2">Delete</button>
                        </form>
                        <a href="{{ route('courses.export.single', $course->id) }}" class="text-green-500 ml-2">PDF</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $courses->links() }}
        </div>
    </div>
</x-app-layout>