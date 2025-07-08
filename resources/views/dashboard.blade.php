<x-app-layout>

    <div class="py-6 px-4 max-w-7xl mx-auto">
        <!-- Welcome Message -->
        <div class="bg-white dark:bg-gray-800 rounded shadow p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Welcome, {{ Auth::user()->name }}!
            </h3>
            <p class="text-gray-600 dark:text-gray-300">
                You are logged in as <span class="font-bold">{{ Auth::user()->role }}</span>.
            </p>
        </div>

        <!-- Quick Links -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <a href="{{ route('courses.index') }}" class="block bg-blue-500 text-white p-4 rounded text-center hover:bg-blue-600">
                Manage Courses
            </a>
            <a href="{{ route('subjects.index') }}" class="block bg-green-500 text-white p-4 rounded text-center hover:bg-green-600">
                Manage Subjects
            </a>
            <a href="{{ route('enrollments.index') }}" class="block bg-purple-500 text-white p-4 rounded text-center hover:bg-purple-600">
                Manage Enrollments
            </a>
        </div>

        <!-- Account Info -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h4 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Your Account Details</h4>
            <ul class="text-gray-700 dark:text-gray-300">
                <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
                <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                <li><strong>Role:</strong> {{ Auth::user()->role }}</li>
            </ul>
        </div>
    </div>
</x-app-layout>