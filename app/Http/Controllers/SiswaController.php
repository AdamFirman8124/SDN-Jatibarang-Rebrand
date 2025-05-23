<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil kelas dari request, default ke null untuk menampilkan semua
        $filterKelas = $request->input('kelas');

        // Ambil siswa berdasarkan relasi dengan kelas
        if ($filterKelas) {
            $siswas = Siswa::whereHas('kelas', function($query) use ($filterKelas) {
                $query->where('nama', $filterKelas);
            })->with(['kelas.staff'])->get()->groupBy(function($siswa) {
                return $siswa->kelas->nama ?? 'Tanpa Kelas';
            });
        } else {
            $siswas = Siswa::with(['kelas.staff'])->get()->groupBy(function($siswa) {
                return $siswa->kelas->nama ?? 'Tanpa Kelas';
            });
        }

        // Jika tidak ada data dan ada filter, coba tampilkan semua
        if ($siswas->isEmpty() && $filterKelas) {
            $siswas = Siswa::with(['kelas.staff'])->get()->groupBy(function($siswa) {
                return $siswa->kelas->nama ?? 'Tanpa Kelas';
            });
            $filterKelas = null; // Reset filter
        }

        $allSiswa = Siswa::all();
        $total = $allSiswa->count();
        $laki = $allSiswa->where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = $allSiswa->where('jenis_kelamin', 'Perempuan')->count();

        return view('user.profile.students', compact('siswas', 'total', 'laki', 'perempuan', 'filterKelas'));
    }

    public function indexAdmin(Request $request)
    {
        // Ambil siswa dengan relasi kelas untuk admin
        $siswas = Siswa::with('kelas')->get();
        $kelas = Kelas::all();

        return view('Admin.Siswa', compact('siswas', 'kelas'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis',
            'kelas' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $data = new Siswa();
        $data->nama = $request->nama;
        $data->nis = $request->nis;
        $data->kelas_id = $request->kelas;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->save();

        session()->flash('success', 'Data siswa berhasil ditambahkan!');
        return redirect()->intended(route('admin.siswa.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis,' . $id,
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $data = Siswa::findOrFail($id);
        $data->nama = $request->nama;
        $data->nis = $request->nis;
        $data->kelas_id = $request->kelas_id;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->save();

        session()->flash('success', 'Data siswa berhasil diperbarui!');
        return redirect()->intended(route('admin.siswa.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Siswa::findOrFail($id);
            $data->delete();
            session()->flash('success', 'Data siswa berhasil dihapus!');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus data siswa!');
        }

        return redirect()->intended(route('admin.siswa.index'));
    }
}

