<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Enrollment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-4">
                        <h1 class="text-xl font-bold mb-4">New Enrollment</h1>

                        <form action="{{ route('enrollments.store') }}" method="POST">
                            @csrf

                            <label class="block mb-2">Select User:</label>
                            <select name="user_id" class="border p-2 w-full mb-4">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>

                            <label class="block mb-2">Select Subject:</label>
                            <select name="subject_id" class="border p-2 w-full mb-4">
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>

                            <label class="block mb-2">Enrollment Date:</label>
                            <input type="date" name="enrolled_at" class="border p-2 w-full mb-4" value="{{ now()->format('Y-m-d') }}">

                            <button class="bg-blue-500 text-white p-2 rounded">Enroll</button>
                            <a href="{{ route('enrollments.index') }}" class="text-gray-700 ml-4">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 