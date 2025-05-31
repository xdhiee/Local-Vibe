<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-900 to-teal-800 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <h2 class="font-bold text-2xl text-white leading-tight flex items-center">
                <svg class="w-8 h-8 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                {{ __('Tambah Destinasi Wisata') }}
            </h2>
            <p class="text-blue-100 mt-1">Isi formulir di bawah untuk menambahkan destinasi wisata baru</p>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm shadow-xl rounded-2xl border border-blue-100 dark:border-gray-700 p-8">
                
                {{-- Tampilkan Pesan Kesalahan Validasi --}}
                @if ($errors->any())
                    <div class="bg-red-100 dark:bg-red-900 border-l-4 border-red-500 dark:border-red-400 text-red-700 dark:text-red-100 p-4 rounded mb-6 flex items-start space-x-3">
                        <svg class="w-6 h-6 text-red-500 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.
                            <ul class="list-disc list-inside mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Destinasi -->
                    <div class="mb-6">
                        <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">
                            Nama Destinasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 focus:ring-offset-2 @error('name') border-red-500 @enderror"
                            placeholder="Contoh: Candi Borobudur" required>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-6">
                        <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">
                            Deskripsi
                        </label>
                        <textarea name="description" id="description" rows="5"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 focus:ring-offset-2 @error('description') border-red-500 @enderror"
                            placeholder="Jelaskan tentang destinasi wisata ini...">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-6">
                        <label for="location" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">
                            Alamat / Lokasi
                        </label>
                        <textarea name="location" id="location" rows="3"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 focus:ring-offset-2 @error('location') border-red-500 @enderror"
                            placeholder="Contoh: Jl. Badrawati, Borobudur, Magelang, Jawa Tengah">{{ old('location') }}</textarea>
                        @error('location')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Region dan Kategori -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Region -->
                        <div>
                            <label for="region_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">
                                Wilayah
                            </label>
                            <select name="region_id" id="region_id"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 focus:ring-offset-2 @error('region_id') border-red-500 @enderror">
                                <option value="">-- Pilih Wilayah --</option>
                                @if(isset($regions))
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                            {{ $region->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('region_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="category_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">
                                Kategori
                            </label>
                            <select name="category_id" id="category_id"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 focus:ring-offset-2 @error('category_id') border-red-500 @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @if(isset($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Harga Tiket -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="price_domestic" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">
                                Harga Tiket Domestik (Rp)
                            </label>
                            <input type="number" name="price_domestic" id="price_domestic" value="{{ old('price_domestic') }}" min="0"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 focus:ring-offset-2 @error('price_domestic') border-red-500 @enderror"
                                placeholder="35000">
                            @error('price_domestic')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="price_foreign" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">
                                Harga Tiket Mancanegara (Rp)
                            </label>
                            <input type="number" name="price_foreign" id="price_foreign" value="{{ old('price_foreign') }}" min="0"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 focus:ring-offset-2 @error('price_foreign') border-red-500 @enderror"
                                placeholder="350000">
                            @error('price_foreign')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-3">
                            Jam Operasional per Hari
                        </label>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl">
                            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                                <div class="flex items-center mb-3 last:mb-0">
                                    <label class="w-20 text-sm text-gray-600 dark:text-gray-400">{{ $day }}</label>
                                    <input type="text" name="opening_hours[{{ $day }}]" 
                                        value="{{ old('opening_hours.'.$day) }}"
                                        class="flex-1 border-gray-300 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 focus:ring-offset-2"
                                        placeholder="Contoh: 24 Jam, 08:00 - 17:00, tutup">
                                </div>
                            @endforeach
                            <small class="text-gray-500 dark:text-gray-400 mt-2 block">
                                Format contoh: "08:00 - 17:00", "24 Jam", "tutup", atau "-" untuk tidak ada info
                            </small>
                        </div>
                        @error('opening_hours')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Gambar Utama -->
                    <div class="mb-6">
                        <label for="featured_image" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">
                            Gambar Utama
                        </label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 focus:ring-offset-2 @error('featured_image') border-red-500 @enderror">
                        <small class="text-gray-500 dark:text-gray-400">Format: JPG, PNG, maksimal 2MB</small>
                        @error('featured_image')
                            <span class="text-red-500 text-sm block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tampilkan di Beranda -->
                    <div class="mb-8">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 focus:ring-offset-2">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Tampilkan di Beranda</span>
                        </label>
                        <small class="text-gray-500 dark:text-gray-400 ml-6">Destinasi akan ditampilkan sebagai destinasi unggulan</small>
                    </div>

                    <!-- Tombol Submit dan Kembali -->
                    <div class="flex justify-between items-center pt-6 border-t border-gray-200 dark:border-gray-600">
                        <a href="{{ route('admin.destinations.index') }}" 
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md">
                            {{ __('Kembali') }}
                        </a>
                        
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-teal-500 hover:from-blue-600 hover:to-teal-600 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md">
                            {{ __('Simpan Destinasi') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Skrip Pratinjau Gambar --}}
    <script>
        document.getElementById('featured_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Hapus pratinjau yang ada jika ada
                const existingPreview = document.getElementById('image-preview');
                if (existingPreview) {
                    existingPreview.remove();
                }
                
                // Buat pratinjau
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.createElement('div');
                    preview.id = 'image-preview';
                    preview.className = 'mt-2';
                    preview.innerHTML = `
                        <img src="${e.target.result}" alt="Preview" class="max-h-40 rounded-xl shadow-md">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Preview gambar</p>
                    `;
                    document.getElementById('featured_image').parentNode.appendChild(preview);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>