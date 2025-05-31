<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-900 to-teal-800 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-2xl text-white leading-tight flex items-center">
                        <svg class="w-8 h-8 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5a2 2 0 012-2h4a2 2 0 012 2v10a2 2 0 01-2 2H10a2 2 0 01-2-2V5z"></path>
                        </svg>
                        {{ __('Dashboard LocalVibe') }}
                    </h2>
                    <p class="text-blue-100 mt-1">Kelola destinasi wisata lokal dengan mudah</p>
                </div>
                <div class="text-right">
                    <p class="text-white text-sm">Selamat datang,</p>
                    <p class="text-yellow-400 font-semibold">{{ Auth::user()->name }}!</p>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Background dengan pattern oceanic -->
    <div class="min-h-screen bg-gradient-to-br from-dark-50 via-teal-50 to-cyan-50 relative">
        <!-- Background pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60"
                height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none"
                fill-rule="evenodd"%3E%3Cg fill="%23000000" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30"
                r="2" /%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="py-8 relative z-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Welcome Card -->
                <div class="mb-8">
                    <div
                        class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-2xl border border-blue-100">
                        <div class="p-8">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h3 class="text-2xl font-bold text-gray-800 mb-2">
                                        👋 Selamat datang di LocalVibe Admin!
                                    </h3>
                                    <p class="text-gray-600 text-lg leading-relaxed">
                                        Anda berhasil masuk ke sistem. Kelola destinasi wisata lokal dan berikan
                                        pengalaman terbaik untuk para traveler.
                                    </p>
                                </div>
                                <div class="ml-6">
                                    <div
                                        class="w-20 h-20 bg-gradient-to-br from-blue-400 to-teal-500 rounded-full flex items-center justify-center">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Destinasi -->
                    <div
                        class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg rounded-xl border border-blue-100 hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-blue-100">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Total Destinasi</p>
                                    <p class="text-2xl font-semibold text-gray-900">24</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wisatawan Bulan Ini -->
                    {{-- <div
                        class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg rounded-xl border border-teal-100 hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-teal-100">
                                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Wisatawan Bulan Ini</p>
                                    <p class="text-2xl font-semibold text-gray-900">1,247</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Rating Rata-rata -->
                    <div
                        class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg rounded-xl border border-yellow-100 hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-100">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Rating Rata-rata</p>
                                    <p class="text-2xl font-semibold text-gray-900">4.8</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pendapatan -->
                    {{-- <div
                        class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg rounded-xl border border-green-100 hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Pendapatan</p>
                                    <p class="text-2xl font-semibold text-gray-900">Rp 45.2M</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <!-- Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- Quick Actions Card -->
                    <div
                        class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-2xl border border-blue-100">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Aksi Cepat
                            </h3>
                            <div class="space-y-3">
                                <a href="{{ route('admin.destinations.create') }}"
                                    class="flex items-center p-3 bg-gradient-to-r from-blue-500 to-teal-500 text-white rounded-lg hover:from-blue-600 hover:to-teal-600 transition-all duration-300 group">
                                    <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Tambah Destinasi Baru
                                </a>

                                <a href="{{ route('admin.destinations.index') }}"
                                    class="flex items-center p-3 bg-white border-2 border-blue-200 text-blue-700 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition-all duration-300 group">
                                    <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                        </path>
                                    </svg>
                                    Kelola Semua Destinasi
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div
                        class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-2xl border border-blue-100">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Aktivitas Terbaru
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg">
                                    <div class="w-2 h-2 rounded-full bg-blue-400 mt-2"></div>
                                    <div>
                                        <p class="text-sm text-gray-800">Destinasi "Pantai Losari" ditambahkan</p>
                                        <p class="text-xs text-gray-500">2 jam yang lalu</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 p-3 bg-teal-50 rounded-lg">
                                    <div class="w-2 h-2 rounded-full bg-teal-400 mt-2"></div>
                                    <div>
                                        <p class="text-sm text-gray-800">Review baru dari wisatawan</p>
                                        <p class="text-xs text-gray-500">5 jam yang lalu</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 p-3 bg-yellow-50 rounded-lg">
                                    <div class="w-2 h-2 rounded-full bg-yellow-400 mt-2"></div>
                                    <div>
                                        <p class="text-sm text-gray-800">Foto destinasi diperbarui</p>
                                        <p class="text-xs text-gray-500">1 hari yang lalu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tips Section -->
                <div class="bg-gradient-to-r from-orange-400 to-pink-400 overflow-hidden shadow-xl rounded-2xl">
                    <div class="p-8">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-white mb-2">
                                    💡 Tips untuk Admin LocalVibe
                                </h3>
                                <p class="text-orange-100 text-lg leading-relaxed mb-4">
                                    Selalu perbarui informasi destinasi secara berkala dan tambahkan foto-foto menarik
                                    untuk meningkatkan daya tarik wisatawan!
                                </p>
                                <div class="flex items-center text-white">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm">Kualitas konten yang baik = Lebih banyak wisatawan</span>
                                </div>
                            </div>
                            <div class="ml-6">
                                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
