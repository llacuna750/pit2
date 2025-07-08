<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="py-8 px-4 max-w-7xl mx-auto">
            <!-- Welcome + Avatar -->
            <div class="relative overflow-hidden bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-slate-200 dark:border-gray-700 p-8 mb-8">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-50/50 to-white/50 dark:from-gray-900/20 dark:to-gray-800/20"></div>
                <div class="relative flex items-center space-x-6">
                    @if(Auth::user()->avatar)
                    <div class="relative">
                        <img src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}"
                            class="w-16 h-16 rounded-full object-cover border-2 border-slate-200 dark:border-gray-600 shadow-sm">
                        <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white dark:border-gray-800"></div>
                    </div>
                    @else
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    @endif
                    <div>
                        <h3 class="text-2xl font-bold text-slate-800 dark:text-slate-200 drop-shadow-sm">
                            Welcome, {{ Auth::user()->name }}!
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

            <!-- Announcement -->
            <div class="relative bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 border border-yellow-200 dark:border-yellow-800 rounded-2xl p-6 mb-8 shadow-sm">
                <div class="absolute inset-0 bg-yellow-100/30 dark:bg-yellow-900/10 rounded-2xl"></div>
                <div class="relative flex items-start space-x-4">
                    <div class="w-10 h-10 bg-yellow-500 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-yellow-800 dark:text-yellow-200 mb-1">📢 Important Announcement</h4>
                        <p class="text-yellow-700 dark:text-yellow-300">
                            Enrollment period closes on <span class="font-bold bg-yellow-200 dark:bg-yellow-800 px-2 py-1 rounded">July 31</span>.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
                <a href="{{ route('courses.index') }}" class="group relative overflow-hidden bg-white dark:bg-gray-800 hover:bg-slate-50 dark:hover:bg-gray-700 p-6 rounded-2xl shadow-sm hover:shadow-md border border-slate-200 dark:border-gray-700 transition-all duration-200 ease-in-out hover:border-blue-300 dark:hover:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-blue-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                    <div class="relative flex items-center space-x-4">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center group-hover:bg-blue-200 dark:group-hover:bg-blue-800/40 transition-colors duration-200">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-200 group-hover:text-slate-900 dark:group-hover:text-slate-100 transition-colors duration-150">Manage Courses</h4>
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Course management</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('subjects.index') }}" class="group relative overflow-hidden bg-white dark:bg-gray-800 hover:bg-slate-50 dark:hover:bg-gray-700 p-6 rounded-2xl shadow-sm hover:shadow-md border border-slate-200 dark:border-gray-700 transition-all duration-200 ease-in-out hover:border-green-300 dark:hover:border-green-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <div class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-green-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                    <div class="relative flex items-center space-x-4">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center group-hover:bg-green-200 dark:group-hover:bg-green-800/40 transition-colors duration-200">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-200 group-hover:text-slate-900 dark:group-hover:text-slate-100 transition-colors duration-150">Manage Subjects</h4>
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Subject management</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('enrollments.index') }}" class="group relative overflow-hidden bg-white dark:bg-gray-800 hover:bg-slate-50 dark:hover:bg-gray-700 p-6 rounded-2xl shadow-sm hover:shadow-md border border-slate-200 dark:border-gray-700 transition-all duration-200 ease-in-out hover:border-purple-300 dark:hover:border-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500/5 to-purple-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                    <div class="relative flex items-center space-x-4">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center group-hover:bg-purple-200 dark:group-hover:bg-purple-800/40 transition-colors duration-200">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-200 group-hover:text-slate-900 dark:group-hover:text-slate-100 transition-colors duration-150">Manage Enrollments</h4>
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Enrollment management</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Enrollment Chart -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-gray-700">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-slate-100 dark:bg-gray-700 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-800 dark:text-slate-200">Enrollment Summary</h4>
                </div>
                <div class="bg-slate-50 dark:bg-gray-700/50 p-4 rounded-xl border border-slate-200 dark:border-gray-600">
                    <canvas id="enrollmentsChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        fetch('/api/enrollments/chart')
            .then(res => res.json())
            .then(data => {
                new Chart(document.getElementById('enrollmentsChart'), {
                    type: 'bar',
                    data: {
                        labels: data.subjects,
                        datasets: [{
                            label: 'Enrollments per Subject',
                            data: data.counts,
                            backgroundColor: 'rgba(59, 130, 246, 0.7)',
                            borderColor: 'rgba(59, 130, 246, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                labels: {
                                    color: document.documentElement.classList.contains('dark') ? '#cbd5e1' : '#475569'
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: document.documentElement.classList.contains('dark') ? '#94a3b8' : '#64748b'
                                },
                                grid: {
                                    color: document.documentElement.classList.contains('dark') ? '#374151' : '#e2e8f0'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: document.documentElement.classList.contains('dark') ? '#94a3b8' : '#64748b'
                                },
                                grid: {
                                    color: document.documentElement.classList.contains('dark') ? '#374151' : '#e2e8f0'
                                }
                            }
                        }
                    }
                });
            });
    </script>
</x-app-layout>