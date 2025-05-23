@extends('Layouts.AdminLayouts')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-row justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Buku</h1>
        <button onclick="openInsertModal()"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center transition-colors">
            <i class="fas fa-plus mr-2"></i>
            Tambah Buku
        </button>
    </div>
    <div class="overflow-x-auto bg-white shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">Pengarang</th>
                    <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">Penerbit</th>
                    <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">Tahun Terbit</th>
                    <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">Jumlah</th>
                    <th class="px-6 py-4 bg-blue-500 text-center text-sm font-medium text-white uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($bukus as $buku)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $buku->judul }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $buku->pengarang }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $buku->penerbit }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $buku->tahun_terbit }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $buku->kategori }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $buku->jumlah }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="flex flex-row gap-x-2 justify-center">
                            <button type="button"
                                data-id="{{ $buku->id }}"
                                onclick="openEditModal(this.dataset.id)"
                                class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-xs w-12 py-2.5 text-center bg-green-600 hover:bg-green-700 focus:ring-green-500">Edit</button>
                            <button type="button"
                                data-url="{{ route('admin.buku.destroy', $buku->id) }}"
                                onclick="openDeleteModal(this.dataset.url)"
                                class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-xs w-12 py-2.5 text-center bg-red-600 hover:bg-red-700 focus:ring-red-500">Delete</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('Insert Modal')
<div id="insertModal" class="hidden fixed inset-0 bg-black bg-opacity-50 bg-opacity-60 justify-center items-center">
    <div class="bg-white rounded-lg w-1/2">
        <form method="POST" action="{{ route('admin.buku.store') }}" class="w-5/6 mx-auto my-5">
            @csrf
            <h2 class="text-center font-semibold text-lg text-black">Tambah Buku Baru</h2><br>

            <div class="basis-1/2 mb-5">
                <label for="judul" class="block mb-2 text-sm font-medium text-black">Judul Buku</label>
                <input name="judul" type="text" id="judul"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="pengarang" class="block mb-2 text-sm font-medium text-black">Pengarang</label>
                <input name="pengarang" type="text" id="pengarang"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="penerbit" class="block mb-2 text-sm font-medium text-black">Penerbit</label>
                <input name="penerbit" type="text" id="penerbit"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-black">Tahun Terbit</label>
                <input name="tahun_terbit" type="number" id="tahun_terbit"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="kategori" class="block mb-2 text-sm font-medium text-black">Kategori</label>
                <input name="kategori" type="text" id="kategori"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="jumlah" class="block mb-2 text-sm font-medium text-black">Jumlah</label>
                <input name="jumlah" type="number" id="jumlah"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-black">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="flex flex-row gap-3">
                <button type="submit"
                    class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 mb-5">Submit</button>
                <button type="button" onclick="closeInsertModal()"
                    class="text-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-gray-100 hover:bg-gray-300 focus:ring-gray-600 mb-5">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('Edit Modal')
@foreach($bukus as $buku)
<div id="editModal{{ $buku->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 bg-opacity-60 justify-center items-center">
    <div class="bg-white rounded-lg w-1/2">
        <form method="POST" action="{{ route('admin.buku.update', $buku->id) }}" class="w-5/6 mx-auto my-5">
            @csrf
            @method('PUT')
            <h2 class="text-center font-semibold text-lg text-black">Edit Buku</h2><br>

            <div class="basis-1/2 mb-5">
                <label for="judul" class="block mb-2 text-sm font-medium text-black">Judul Buku</label>
                <input name="judul" type="text" id="judul" value="{{ $buku->judul }}"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="pengarang" class="block mb-2 text-sm font-medium text-black">Pengarang</label>
                <input name="pengarang" type="text" id="pengarang" value="{{ $buku->pengarang }}"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="penerbit" class="block mb-2 text-sm font-medium text-black">Penerbit</label>
                <input name="penerbit" type="text" id="penerbit" value="{{ $buku->penerbit }}"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-black">Tahun Terbit</label>
                <input name="tahun_terbit" type="number" id="tahun_terbit" value="{{ $buku->tahun_terbit }}"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="kategori" class="block mb-2 text-sm font-medium text-black">Kategori</label>
                <input name="kategori" type="text" id="kategori" value="{{ $buku->kategori }}"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="jumlah" class="block mb-2 text-sm font-medium text-black">Jumlah</label>
                <input name="jumlah" type="number" id="jumlah" value="{{ $buku->jumlah }}"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="basis-1/2 mb-5">
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-black">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">{{ $buku->deskripsi }}</textarea>
            </div>
            <div class="flex flex-row gap-3">
                <button type="submit"
                    class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 mb-5">Submit</button>
                <button type="button" onclick="closeEditModal('{{ $buku->id }}')"
                    class="text-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-gray-100 hover:bg-gray-300 focus:ring-gray-600 mb-5">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection

@section('Delete Modal')
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 bg-opacity-60 justify-center items-center">
    <div class="bg-white rounded-lg w-1/3">
        <div class="p-6">
            <h2 class="text-center font-semibold text-lg text-black mb-4">Konfirmasi Hapus</h2>
            <p class="text-center text-gray-600 mb-6">Apakah Anda yakin ingin menghapus data ini?</p>
            <form id="deleteForm" method="POST" class="flex flex-row gap-3">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-red-600 hover:bg-red-700 focus:ring-red-800">Hapus</button>
                <button type="button" onclick="closeDeleteModal()"
                    class="text-gray-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-gray-100 hover:bg-gray-300 focus:ring-gray-600">Batal</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function openInsertModal() {
        document.getElementById('insertModal').classList.remove('hidden');
        document.getElementById('insertModal').classList.add('flex');
    }

    function closeInsertModal() {
        document.getElementById('insertModal').classList.add('hidden');
        document.getElementById('insertModal').classList.remove('flex');
    }

    function openEditModal(id) {
        document.getElementById('editModal' + id).classList.remove('hidden');
        document.getElementById('editModal' + id).classList.add('flex');
    }

    function closeEditModal(id) {
        document.getElementById('editModal' + id).classList.add('hidden');
        document.getElementById('editModal' + id).classList.remove('flex');
    }

    function openDeleteModal(url) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
        document.getElementById('deleteForm').action = url;
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }
</script>
@endsection
