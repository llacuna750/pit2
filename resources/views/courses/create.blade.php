@extends('layouts.app')

@section('content')
<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Create Course</h1>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <label class="block mb-2">Title:</label>
        <input type="text" name="title" class="border p-2 w-full mb-4" required>

        <label class="block mb-2">Description:</label>
        <textarea name="description" class="border p-2 w-full mb-4"></textarea>

        <button class="bg-blue-500 text-white p-2 rounded">Save</button>
        <a href="{{ route('courses.index') }}" class="text-gray-700 ml-4">Cancel</a>
    </form>
</div>
@endsection