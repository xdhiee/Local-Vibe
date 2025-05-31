<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-900 to-teal-800 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <h2 class="font-bold text-2xl text-white leading-tight flex items-center">
                {{ __('Tambah Kategori') }}
            </h2>
        </div>
    </x-slot>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Tambah Kategori') }}
        </h2>
    </x-slot> --}}

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                <!-- Tombol Kembali -->
                <div class="mb-4">
                    <a href="{{ route('admin.categories.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                        ← Kembali ke Daftar Kategori
                    </a>
                </div>

                <!-- Form Tambah Kategori -->
                <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-6">
                    @csrf

                    <!-- Input Nama -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama Kategori</label>
                        <input type="text" name="name" id="name" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                               placeholder="Contoh: Wisata Alam">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Simpan -->
                    <div>
                        <x-primary-button>
                            Simpan
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
