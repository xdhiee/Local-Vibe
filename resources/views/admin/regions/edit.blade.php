<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Edit Wilayah') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Tombol Kembali -->
            <div class="mb-4">
                <a href="{{ route('admin.regions.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                    ← Kembali ke Daftar Wilayah
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-lg">
                <form method="POST" action="{{ route('admin.regions.update', $region->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Input Nama Wilayah -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Nama Wilayah
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $region->name) }}"
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
