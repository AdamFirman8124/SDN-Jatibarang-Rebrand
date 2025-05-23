@extends('Layouts.AdminLayouts')

@section('content')
    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Berita</h1>
            <button onclick="openInsertModal()"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Tambah Berita Baru
            </button>
        </div>

        <!-- News Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- News Card 1 -->
            @foreach ($beritas as $p)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="relative h-48">
                        <img src={{ asset($p->gallery->path) }} alt="News Image" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $p->tanggal }}
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $p->judul }}</h2>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $p->deskripsi }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                <button onclick="openEditModal('{{ $p->id }}')"
                                    class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 rounded text-sm transition-colors">
                                    Edit
                                </button>
                                <button onclick="openDeleteModal('{{ route('admin.berita.destroy', $p->id) }}')"
                                    class="bg-red-100 hover:bg-red-200 text-red-600 px-3 py-1 rounded text-sm transition-colors">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('Insert Modal')
    <div id="insertModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg mx-4">
            <div class="p-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">Tambah Berita Baru</h2>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="judul" class="block text-gray-700 font-medium mb-2">Judul</label>
                        <input type="text" id="judul" name="judul"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-2">
                        <label for="deskripsi" class="block text-gray-700 font-medium mb-2">deskripsi</label>
                        <textarea id="deskripsi" rows="4" name="deskripsi"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="mb-2 basis-1/2">
                            <label for="penulis" class="block text-gray-700 font-medium mb-2">Penulis</label>
                            <input type="text" id="penulis" name="penulis"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-2 basis-1/2">
                            <label for="tanggal" class="block text-gray-700 font-medium mb-2">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-2 basis-1/2">
                            <label for="kategori" class="block text-gray-700 font-medium mb-2">Kategori</label>
                            <select name="kategori" type="text" id="kategori"
                                class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
                                <option disabled selected>Kategori</option>
                                <option value="Pengumuman">Pengumuman</option>
                                <option value="Prestasi">Prestasi</option>
                                <option value="Kegiatan">Kegiatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-700 font-medium mb-2">Image</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-1 text-sm text-gray-500">Drag and drop an image or click to browse</p>

                            <input id="imageInput" type="file" name="gambar" class="hidden" accept="image/*">
                            <button type="button" onclick="document.getElementById('imageInput').click()"
                                class="mt-2 inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Browse
                            </button>

                            <p id="fileName" class="mt-2 text-sm text-gray-600"></p>
                        </div>
                    </div>
                    <div class="p-4 border-t border-gray-200 flex justify-end space-x-3">
                        <button onclick="closeInsertModal()"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                            Tambah Berita
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        const input = document.getElementById('imageInput');
        const fileNameDisplay = document.getElementById('fileName');

        input.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                fileNameDisplay.textContent = `Selected file: ${this.files[0].name}`;
            } else {
                fileNameDisplay.textContent = '';
            }
        });
    </script>
@endsection


@section('Edit Modal')
    @foreach ($beritas as $p)
        <div id="editModal{{ $p->id }}"
            class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg mx-4">
                <div class="p-4 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">Edit Berita: {{ $p->judul }}</h2>
                </div>
                <div class="p-4">
                    <form method="POST" action="{{ route('admin.berita.update', $p->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Spoofing PUT method untuk update --}}

                        <div class="mb-2">
                            <label for="judul{{ $p->id }}"
                                class="block text-gray-700 font-medium mb-2">Judul</label>
                            <input type="text" id="judul{{ $p->id }}" name="judul"
                                value="{{ old('judul', $p->judul) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-2">
                            <label for="deskripsi{{ $p->id }}"
                                class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                            <textarea id="deskripsi{{ $p->id }}" rows="4" name="deskripsi"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $p->deskripsi) }}</textarea>
                        </div>

                        <div class="flex flex-row gap-2">
                            <div class="mb-2 basis-1/2">
                                <label for="penulis{{ $p->id }}"
                                    class="block text-gray-700 font-medium mb-2">Penulis</label>
                                <input type="text" id="penulis{{ $p->id }}" name="penulis"
                                    value="{{ old('penulis', $p->penulis) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="mb-2 basis-1/2">
                                <label for="tanggal{{ $p->id }}"
                                    class="block text-gray-700 font-medium mb-2">Tanggal</label>
                                <input type="date" id="tanggal{{ $p->id }}" name="tanggal"
                                    value="{{ old('tanggal', $p->tanggal) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="mb-2 basis-1/2">
                                <label for="kategori{{ $p->id }}"
                                    class="block text-gray-700 font-medium mb-2">Kategori</label>
                                <select name="kategori" id="kategori{{ $p->id }}"
                                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
                                    <option disabled>Kategori</option>
                                    <option value="Pengumuman"
                                        {{ old('kategori', $p->kategori) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman
                                    </option>
                                    <option value="Prestasi"
                                        {{ old('kategori', $p->kategori) == 'Prestasi' ? 'selected' : '' }}>Prestasi
                                    </option>
                                    <option value="Kegiatan"
                                        {{ old('kategori', $p->kategori) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="block text-gray-700 font-medium mb-2">Image (biarkan kosong jika tidak ingin
                                ganti)</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-1 text-sm text-gray-500">Drag and drop an image or click to browse</p>

                                <input id="imageInput{{ $p->id }}" type="file" name="gambar" class="hidden"
                                    accept="image/*">
                                <button type="button"
                                    onclick="document.getElementById('imageInput{{ $p->id }}').click()"
                                    class="mt-2 inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Browse
                                </button>

                                <p id="fileName{{ $p->id }}" class="mt-2 text-sm text-gray-600"></p>
                            </div>
                        </div>

                        <div class="p-4 border-t border-gray-200 flex justify-end space-x-3">
                            <button type="button" onclick="closeEditModal({{ $p->id }})"
                                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors">
                                Update Berita
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            const input{{ $p->id }} = document.getElementById('imageInput{{ $p->id }}');
            const fileNameDisplay{{ $p->id }} = document.getElementById('fileName{{ $p->id }}');

            input{{ $p->id }}.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    fileNameDisplay{{ $p->id }}.textContent = `Selected file: ${this.files[0].name}`;
                } else {
                    fileNameDisplay{{ $p->id }}.textContent = '';
                }
            });
        </script>
    @endforeach
@endsection
