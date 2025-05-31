<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-900 to-teal-800 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <h2 class="font-bold text-2xl text-white leading-tight flex items-center">
                {{ __('Daftar Kategori') }}
            </h2>
        </div>
    </x-slot>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Daftar Kategori') }}
        </h2>
    </x-slot> --}}

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Tombol Kembali -->
            <div class="mb-4">
                <a href="{{ route('admin.destinations.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                    ← Kembali ke Destinasi
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <!-- Tombol Tambah Kategori -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Manajemen Kategori</h3>
                    <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow transition duration-200">
                        + Tambah Kategori
                    </a>
                </div>

                <!-- Tabel Kategori -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Nama Kategori</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal Dibuat</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($categories as $category)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150">
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $category->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 font-medium">{{ $category->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                        {{ $category->created_at ? $category->created_at->format('d M Y') : '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center space-x-2">
                                            {{-- <!-- Tombol Edit -->
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" 
                                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-medium transition duration-200 shadow-sm">
                                                Edit
                                            </a> --}}
                                            
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" 
                                                  method="POST" 
                                                  class="inline-block"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $category->name }}? Tindakan ini tidak dapat dibatalkan.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-medium transition duration-200 shadow-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                            <p class="text-lg font-medium mb-1">Belum ada kategori</p>
                                            <p class="text-sm">Klik tombol "Tambah Kategori" untuk membuat kategori baru.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination (jika menggunakan pagination) -->
                @if(method_exists($categories, 'links'))
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>

    <!-- Script untuk konfirmasi hapus yang lebih interaktif -->
    <script>
        // Fungsi untuk konfirmasi hapus dengan SweetAlert jika tersedia
        function confirmDelete(categoryName, form) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Hapus Kategori?',
                    text: `Apakah Anda yakin ingin menghapus kategori "${categoryName}"? Tindakan ini tidak dapat dibatalkan.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
                return false;
            }
            
            // Fallback ke confirm biasa jika SweetAlert tidak ada
            return confirm(`Apakah Anda yakin ingin menghapus kategori "${categoryName}"? Tindakan ini tidak dapat dibatalkan.`);
        }
    </script>
</x-app-layout>