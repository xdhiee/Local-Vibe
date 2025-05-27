<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Daftar Destinasi Wisata') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
                
                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <a href="{{ route('admin.destinations.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow">
                        + Tambah Destinasi
                    </a>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium px-4 py-2 rounded shadow">
                            Lihat Semua Kategori
                        </a>
                        <a href="{{ route('admin.regions.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium px-4 py-2 rounded shadow">
                            Lihat Semua Wilayah
                        </a>
                    </div>
                </div>

                <!-- Tabel Destinasi -->
                <div class="overflow-x-auto rounded">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Slug</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($destinations as $destination)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $destination->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $destination->slug }}</td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="{{ route('admin.destinations.edit', $destination) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1 rounded shadow text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus destinasi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded shadow text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-6 text-center text-gray-500 dark:text-gray-400 text-sm italic">
                                        Belum ada destinasi yang ditambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
