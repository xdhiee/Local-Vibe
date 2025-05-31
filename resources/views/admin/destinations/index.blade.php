<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-900 to-teal-800 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-2xl text-white leading-tight flex items-center">
                        <svg class="w-8 h-8 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ __('Daftar Destinasi Wisata') }}
                    </h2>
                    <p class="text-blue-100 mt-1">Kelola semua destinasi wisata lokal dengan mudah</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-white text-sm">Total Destinasi</p>
                        <p class="text-yellow-400 font-bold text-xl">{{ $destinations->count() }}</p>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Background dengan pattern oceanic -->
    <div class="min-h-screen bg-gradient-to-br from-dark-50 via-teal-50 to-cyan-50 relative">
        <!-- Background pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="py-8 relative z-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                
                <!-- Action Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Tambah Destinasi -->
                    <div class="bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl border border-blue-100 hover:shadow-2xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 rounded-full bg-gradient-to-br from-blue-500 to-teal-500">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Utama</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Tambah Destinasi</h3>
                            <p class="text-gray-600 text-sm mb-4">Buat destinasi wisata baru untuk menarik lebih banyak wisatawan</p>
                            <a href="{{ route('admin.destinations.create') }}" 
                               class="block w-full bg-gradient-to-r from-blue-500 to-teal-500 hover:from-blue-600 hover:to-teal-600 text-white font-semibold py-3 px-4 rounded-lg text-center transition-all duration-300 transform hover:scale-105">
                                + Tambah Destinasi Baru
                            </a>
                        </div>
                    </div>

                    <!-- Kategori -->
                    <div class="bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl border border-purple-100 hover:shadow-2xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 rounded-full bg-gradient-to-br from-purple-500 to-pink-500">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <span class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded-full font-medium">Manajemen</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Kelola Kategori</h3>
                            <p class="text-gray-600 text-sm mb-4">Organisir destinasi berdasarkan jenis dan kategori wisata</p>
                            <a href="{{ route('admin.categories.index') }}" 
                               class="block w-full bg-white border-2 border-purple-300 hover:bg-purple-50 hover:border-purple-400 text-purple-700 font-semibold py-3 px-4 rounded-lg text-center transition-all duration-300">
                                Lihat Semua Kategori
                            </a>
                        </div>
                    </div>

                    <!-- Wilayah -->
                    <div class="bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl border border-orange-100 hover:shadow-2xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 rounded-full bg-gradient-to-br from-orange-500 to-red-500">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                    </svg>
                                </div>
                                <span class="text-xs bg-orange-100 text-orange-800 px-2 py-1 rounded-full font-medium">Geografis</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Kelola Wilayah</h3>
                            <p class="text-gray-600 text-sm mb-4">Atur destinasi berdasarkan lokasi dan wilayah geografis</p>
                            <a href="{{ route('admin.regions.index') }}" 
                               class="block w-full bg-white border-2 border-orange-300 hover:bg-orange-50 hover:border-orange-400 text-orange-700 font-semibold py-3 px-4 rounded-lg text-center transition-all duration-300">
                                Lihat Semua Wilayah
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main Content Card -->
                <div class="bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl border border-blue-100">
                    <div class="p-8">
                        <!-- Header Section -->
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                    </svg>
                                    Daftar Destinasi
                                </h3>
                                <p class="text-gray-600 mt-1">Kelola dan monitor semua destinasi wisata yang tersedia</p>
                            </div>
                            
                            <!-- Search & Filter (Optional) -->
                            <div class="flex items-center space-x-3">
                                <div class="relative">
                                    <input type="text" placeholder="Cari destinasi..." 
                                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Row -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                            <div class="bg-gradient-to-r from-blue-500 to-teal-500 p-4 rounded-xl text-white">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-blue-100 text-sm">Total Destinasi</p>
                                        <p class="text-2xl font-bold">{{ $destinations->count() }}</p>
                                    </div>
                                    <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-green-500 to-emerald-500 p-4 rounded-xl text-white">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-green-100 text-sm">Aktif</p>
                                        <p class="text-2xl font-bold">{{ $destinations->count() }}</p>
                                    </div>
                                    <svg class="w-8 h-8 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-yellow-500 to-orange-500 p-4 rounded-xl text-white">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-yellow-100 text-sm">Rating Rata-rata</p>
                                        <p class="text-2xl font-bold">4.8</p>
                                    </div>
                                    <svg class="w-8 h-8 text-yellow-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-purple-500 to-indigo-500 p-4 rounded-xl text-white">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-purple-100 text-sm">Pengunjung</p>
                                        <p class="text-2xl font-bold">1.2K+</p>
                                    </div>
                                    <svg class="w-8 h-8 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Table -->
                        <div class="overflow-hidden rounded-2xl border border-gray-200">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                    </svg>
                                                    Nama Destinasi
                                                </div>
                                            </th>
                                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                                    </svg>
                                                    Slug URL
                                                </div>
                                            </th>
                                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                                    </svg>
                                                    Status
                                                </div>
                                            </th>
                                            <th class="px-6 py-4 text-center text-sm font-bold text-gray-700 uppercase tracking-wider">
                                                <div class="flex items-center justify-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                                    </svg>
                                                    Aksi
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($destinations as $destination)
                                            <tr class="hover:bg-blue-50/50 transition-colors duration-200">
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-teal-500 rounded-xl flex items-center justify-center mr-4">
                                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <p class="text-sm font-semibold text-gray-900">{{ $destination->name }}</p>
                                                            <p class="text-xs text-gray-500">ID: #{{ $destination->id }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <code class="bg-gray-100 text-gray-800 px-3 py-1 rounded-md text-sm font-mono">
                                                            {{ $destination->slug }}
                                                        </code>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        Aktif
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center justify-center space-x-2">
                                                        <a href="{{ route('admin.destinations.edit', $destination) }}" 
                                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-white text-sm font-medium rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md">
                                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST" 
                                                              class="inline-block" onsubmit="return confirm('⚠️ Yakin ingin menghapus destinasi ini?\n\nData yang dihapus tidak dapat dikembalikan!');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" 
                                                                    class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white text-sm font-medium rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md">
                                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="px-6 py-12 text-center">
                                                    <div class="flex flex-col items-center justify-center">
                                                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            </svg>
                                                        </div>
                                                        <h3 class="text-lg font-semibold text-gray-600 mb-2">Belum Ada Destinasi</h3>
                                                        <p class="text-gray-500 text-sm mb-6 max-w-sm">
                                                            Anda belum menambahkan destinasi wisata apapun. Mulai dengan menambahkan destinasi pertama Anda!
                                                        </p>
                                                        <a href="{{ route('admin.destinations.create') }}" 
                                                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-teal-500 hover:from-blue-600 hover:to-teal-600 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
                                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                            </svg>
                                                            Tambah Destinasi Pertama
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Pagination -->
                        @if ($destinations->hasPages())
                            <div class="mt-6 flex justify-center">
                                {{ $destinations->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>