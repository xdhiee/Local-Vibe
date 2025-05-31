<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-900 to-teal-800 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <h2 class="font-bold text-2xl text-white leading-tight flex items-center">
                {{ __('Daftar Wilayah') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Tombol Kembali -->
            <div class="mb-4">
                <a href="{{ route('admin.destinations.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                    ← Kembali ke Destinasi
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <!-- Tombol Tambah Wilayah -->
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('admin.regions.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                        + Tambah Wilayah
                    </a>
                </div>

                <!-- Tabel Wilayah -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Nama Wilayah</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($regions as $region)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $region->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $region->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.regions.edit', $region->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.regions.destroy', $region->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus wilayah ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-6 text-center text-gray-500 dark:text-gray-400 italic">
                                        Belum ada wilayah yang ditambahkan.
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
