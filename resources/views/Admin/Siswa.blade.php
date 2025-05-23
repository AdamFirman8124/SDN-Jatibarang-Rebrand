@extends('Layouts.AdminLayouts')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <div class="flex flex-row justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Data Siswa</h1>
                <button onclick="openInsertModal()"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Siswa Baru
                </button>
        </div>
        <div class="overflow-x-auto bg-white shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">
                            NIS
                        </th>
                        <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">
                            Nama
                        </th>
                        <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">
                            Kelas
                        </th>
                        <th class="px-6 py-4 bg-blue-500 text-left text-sm font-medium text-white uppercase tracking-wider">
                            Jenis Kelamin
                        </th>
                        <th
                            class="px-6 py-4 text-center bg-blue-500 text-sm font-medium text-white uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($siswas as $p)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $p->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $p->nis }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $p->nama }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $p->kelas->nama }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $p->jenis_kelamin }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div class="flex flex-row gap-x-2 justify-center">
                                    <button type="button"
                                        data-id="{{ $p->id }}"
                                        onclick="openEditModal(this.dataset.id)"
                                        class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-xs w-12 py-2.5 text-center bg-green-600 hover:bg-green-700 focus:ring-green-500">Edit</button>
                                    <button type="button"
                                        data-url="{{ route('admin.siswa.destroy', $p->id) }}"
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
    <div id="insertModal" class="hidden fixed inset-0 bg-black bg-opacity-50 bg-opacity-60 justify-center items-center flex">
        <div class="bg-white rounded-lg w-1/2">
            <form method="POST" action={{ route('admin.siswa.store') }} class="w-5/6 mx-auto my-5">
                @csrf
                <h2 class="text-center font-semibold text-lg text-black">Tambahkan Siswa Baru</h2><br>

                <div class="basis-1/2 mb-5">
                    <label for="nis" class="block mb-2 text-sm font-medium text-black">NIS</label>
                    <input name="nis" type="text" id="nis"
                        class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="basis-1/2 mb-5">
                    <label for="nama" class="block mb-2 text-sm font-medium text-black">Nama</label>
                    <input name="nama" type="text" id="nama"
                        class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="basis-1/2 mb-5">
                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-black">Jenis Kelamin</label>
                    <select name="jenis_kelamin" type="text" id="jenis_kelamin"
                        class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
                        <option disabled selected>Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="basis-1/2 mb-5">
                    <label for="kelas_id" class="block mb-2 text-sm font-medium text-black">Kelas</label>
                    <select name="kelas_id" type="text" id="kelas_id"
                        class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
                        <option disabled selected>Kelas</option>
                        @foreach ($kelas as $c)
                            <option value="{{ $c->id }}">{{ $c->nama }}</option>
                        @endforeach
                    </select>
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
    @foreach ($siswas as $p)
        <div id="editModal{{ $p->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 bg-opacity-60 justify-center items-center flex">
            <div class="bg-white rounded-lg w-1/2">
                <form method="POST" action={{ route('admin.siswa.update', $p->id) }} class="w-5/6 mx-auto my-5">
                    @csrf
                    @method('PUT')
                    <h2 class="text-center font-semibold text-lg text-black">Edit Siswa</h2><br>

                    <div class="basis-1/2 mb-5">
                        <label for="nis" class="block mb-2 text-sm font-medium text-black">NIS</label>
                        <input name="nis" type="text" id="nis" value="{{ $p->nis }}"
                            class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="basis-1/2 mb-5">
                        <label for="nama" class="block mb-2 text-sm font-medium text-black">Nama</label>
                        <input name="nama" type="text" id="nama" value="{{ $p->nama }}"
                            class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="basis-1/2 mb-5">
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-black">Jenis Kelamin</label>
                        <select name="jenis_kelamin" type="text" id="jenis_kelamin"
                            class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
                            <option disabled selected>Jenis Kelamin</option>
                            <option value="Laki-laki" {{ $p->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ $p->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="basis-1/2 mb-5">
                        <label for="kelas_id" class="block mb-2 text-sm font-medium text-black">Kelas</label>
                        <select name="kelas_id" type="text" id="kelas_id"
                            class="border ext-sm rounded-lg block w-full p-2 bg-gray-100 border-gray-50 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500">
                            <option disabled>Kelas</option>
                            @foreach ($kelas as $c)
                                <option value="{{ $c->id }}" {{ $p->kelas_id == $c->id ? 'selected' : '' }}>{{ $c->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-row gap-3">
                        <button type="submit"
                            class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 mb-5">Submit</button>
                        <button type="button" onclick="closeEditModal('{{ $p->id }}')"
                            class="text-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-gray-100 hover:bg-gray-300 focus:ring-gray-600 mb-5">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

@section('Delete Modal')
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 bg-opacity-60 justify-center items-center flex">
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
