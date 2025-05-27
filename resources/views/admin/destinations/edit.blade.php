<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Destinasi: {{ $destination->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                {{-- Display Validation Errors --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.destinations.update', $destination) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-1 text-gray-700 dark:text-gray-300">Nama <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $destination->name) }}"
                            class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror" required>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-1 text-gray-700 dark:text-gray-300">Deskripsi</label>
                        <textarea name="description" rows="4"
                            class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white @error('description') border-red-500 @enderror"
                            placeholder="Masukkan deskripsi destinasi...">{{ old('description', $destination->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-1 text-gray-700 dark:text-gray-300">Lokasi</label>
                        <input type="text" name="location" value="{{ old('location', $destination->location) }}"
                            class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white @error('location') border-red-500 @enderror"
                            placeholder="Contoh: Yogyakarta, Indonesia">
                        @error('location')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Region dan Kategori -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <!-- Region -->
                        <div>
                            <label class="block text-sm font-bold mb-1 text-gray-700 dark:text-gray-300">Region</label>
                            <select name="region_id" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white @error('region_id') border-red-500 @enderror">
                                <option value="">-- Pilih Region --</option>
                                @if(isset($regions))
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}" 
                                            {{ old('region_id', $destination->region_id) == $region->id ? 'selected' : '' }}>
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
                            <label class="block text-sm font-bold mb-1 text-gray-700 dark:text-gray-300">Kategori</label>
                            <select name="category_id" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white @error('category_id') border-red-500 @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @if(isset($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ old('category_id', $destination->category_id) == $category->id ? 'selected' : '' }}>
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

                    <!-- Harga -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-bold mb-1 text-gray-700 dark:text-gray-300">Harga Domestik (Rp)</label>
                            <input type="number" name="price_domestic" min="0"
                                value="{{ old('price_domestic', $destination->price_domestic) }}"
                                class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white @error('price_domestic') border-red-500 @enderror"
                                placeholder="0">
                            @error('price_domestic')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1 text-gray-700 dark:text-gray-300">Harga Mancanegara (Rp)</label>
                            <input type="number" name="price_foreign" min="0"
                                value="{{ old('price_foreign', $destination->price_foreign) }}"
                                class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white @error('price_foreign') border-red-500 @enderror"
                                placeholder="0">
                            @error('price_foreign')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2 text-gray-700 dark:text-gray-300">Jam Operasional</label>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded">
                            @php
                                $defaultHours = is_string($destination->opening_hours) 
                                    ? json_decode($destination->opening_hours, true) ?? []
                                    : ($destination->opening_hours ?? []);
                                $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                            @endphp
                            @foreach ($days as $day)
                                <div class="flex items-center mb-2">
                                    <label class="w-20 text-sm text-gray-700 dark:text-gray-300">{{ $day }}</label>
                                    <input type="text" name="opening_hours[{{ $day }}]"
                                        value="{{ old('opening_hours.'.$day, $defaultHours[$day] ?? '') }}"
                                        class="flex-1 border rounded p-2 text-sm dark:bg-gray-600 dark:text-white"
                                        placeholder="Contoh: 08:00 - 17:00, 24 Jam, tutup">
                                </div>
                            @endforeach
                            <small class="text-gray-500 dark:text-gray-400">
                                Contoh format: "08:00 - 17:00", "24 Jam", "tutup", atau "-" untuk tidak ada info
                            </small>
                        </div>
                    </div>

                    <!-- Gambar Unggulan -->
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-1 text-gray-700 dark:text-gray-300">Gambar Unggulan</label>
                        @if ($destination->featured_image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $destination->featured_image) }}" alt="Gambar Unggulan"
                                    class="max-h-40 rounded shadow">
                                <p class="text-sm text-gray-500 mt-1">Gambar saat ini</p>
                            </div>
                        @endif
                        <input type="file" name="featured_image" accept="image/*"
                            class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white @error('featured_image') border-red-500 @enderror">
                        <small class="text-gray-500 dark:text-gray-400">Format: JPG, PNG, maksimal 2MB</small>
                        @error('featured_image')
                            <span class="text-red-500 text-sm block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Is Featured -->
                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" value="1" 
                                {{ old('is_featured', $destination->is_featured) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Jadikan destinasi unggulan</span>
                        </label>
                        <small class="text-gray-500 dark:text-gray-400">Destinasi unggulan akan ditampilkan di halaman utama</small>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-between items-center">
                        <a href="{{ route('admin.destinations.index') }}" 
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            Kembali
                        </a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

                <!-- Gambar Tambahan -->
                @if(isset($destination->images))
                <div class="mt-10 border-t pt-6">
                    <h3 class="text-lg font-bold mb-3 text-gray-800 dark:text-gray-200">Foto Tambahan</h3>

                    <!-- Upload Form -->
                    <form action="{{ route('destination-images.store') }}" method="POST" enctype="multipart/form-data"
                        class="mb-6 p-4 bg-gray-50 dark:bg-gray-700 rounded">
                        @csrf
                        <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                        <div class="flex flex-col sm:flex-row gap-2">
                            <input type="file" name="images[]" multiple accept="image/*"
                                class="flex-1 border rounded p-2 dark:bg-gray-600 dark:text-white">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded whitespace-nowrap">
                                Unggah Foto
                            </button>
                        </div>
                        <small class="text-gray-500 dark:text-gray-400">Dapat memilih beberapa file sekaligus</small>
                    </form>

                    <!-- Display Images -->
                    @if($destination->images && $destination->images->count() > 0)
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach ($destination->images as $img)
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $img->image_path) }}" 
                                        class="w-full h-32 object-cover rounded shadow">
                                    <form action="{{ route('destination-images.destroy', $img->id) }}" method="POST"
                                        class="absolute top-1 right-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            onclick="return confirm('Yakin ingin menghapus foto ini?')"
                                            class="text-xs bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded shadow">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400 text-center py-8">Belum ada foto tambahan</p>
                    @endif
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>