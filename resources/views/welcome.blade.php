<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyLMS - Learning Management System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen flex flex-col items-center justify-center px-4">

    <!-- Header -->
    <header class="w-full max-w-4xl flex justify-between items-center py-4">
        <h1 class="text-2xl font-bold text-indigo-600">MyLMS</h1>
        @if (Route::has('login'))
        <div class="space-x-4 text-sm">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-indigo-600 hover:underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:underline">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </header>

    <!-- Main Content -->
    <main class="text-center mt-12">
        <h2 class="text-3xl font-semibold mb-4">Welcome to MyLMS</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-6">
            A simple and effective Learning Management System for students and teachers.
        </p>
        <a href="{{ route('register') }}"
            class="inline-block bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">
            Get Started
        </a>
    </main>

</body>

</html>