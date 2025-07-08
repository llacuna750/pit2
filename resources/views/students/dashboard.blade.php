<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="py-8 px-4 max-w-7xl mx-auto">
            <!-- Welcome Message -->
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6">
                <p><strong>📢 Announcement:</strong> Enrollment deadline is July 31!</p>
            </div>
            <div class="relative overflow-hidden bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-slate-200 dark:border-gray-700 p-8 mb-8">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-50/50 to-white/50 dark:from-gray-900/20 dark:to-gray-800/20"></div>

                <div class="relative">
                    <div class="flex items-center space-x-4 mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>


                        <div>
                            <h3 class="text-2xl font-bold text-slate-800 dark:text-slate-200 drop-shadow-sm">
                                Welcome back, {{ Auth::user()->name }}!
                            </h3>
                            <p class="text-slate-600 dark:text-slate-300 flex items-center space-x-2">
                                <span>You are logged in as</span>
                                <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-slate-100 dark:bg-gray-700 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-gray-600">
                                    {{ Auth::user()->role }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Navigation -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                <a href="{{ route('my.enrollments') }}" class="group relative overflow-hidden bg-white dark:bg-gray-800 hover:bg-slate-50 dark:hover:bg-gray-700 text-slate-700 dark:text-slate-300 p-6 rounded-2xl shadow-sm hover:shadow-md border border-slate-200 dark:border-gray-700 transition-all duration-200 ease-in-out hover:border-blue-300 dark:hover:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-blue-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                    <div class="relative flex items-center space-x-4">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center group-hover:bg-blue-200 dark:group-hover:bg-blue-800/40 transition-colors duration-200">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-200 group-hover:text-slate-900 dark:group-hover:text-slate-100 transition-colors duration-150">My Enrollments</h4>
                            <p class="text-slate-500 dark:text-slate-400 text-sm">View your courses</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('profile.edit') }}" class="group relative overflow-hidden bg-white dark:bg-gray-800 hover:bg-slate-50 dark:hover:bg-gray-700 text-slate-700 dark:text-slate-300 p-6 rounded-2xl shadow-sm hover:shadow-md border border-slate-200 dark:border-gray-700 transition-all duration-200 ease-in-out hover:border-slate-300 dark:hover:border-slate-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-100/50 to-slate-200/50 dark:from-gray-700/20 dark:to-gray-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                    <div class="relative flex items-center space-x-4">
                        <div class="w-12 h-12 bg-slate-100 dark:bg-gray-700 rounded-xl flex items-center justify-center group-hover:bg-slate-200 dark:group-hover:bg-gray-600 transition-colors duration-200">
                            <svg class="w-6 h-6 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-200 group-hover:text-slate-900 dark:group-hover:text-slate-100 transition-colors duration-150">Edit Profile</h4>
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Update your info</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Account Info -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-gray-700">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-slate-100 dark:bg-gray-700 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-800 dark:text-slate-200">Your Account Details</h4>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-slate-50 dark:bg-gray-700/50 p-4 rounded-xl border border-slate-200 dark:border-gray-600">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Name</p>
                                <p class="text-lg font-semibold text-slate-800 dark:text-slate-200">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 dark:bg-gray-700/50 p-4 rounded-xl border border-slate-200 dark:border-gray-600">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-slate-100 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Email</p>
                                <p class="text-lg font-semibold text-slate-800 dark:text-slate-200">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 dark:bg-gray-700/50 p-4 rounded-xl border border-slate-200 dark:border-gray-600">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-slate-100 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Role</p>
                                <p class="text-lg font-semibold text-slate-800 dark:text-slate-200">{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>