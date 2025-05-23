<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::latest()->paginate(6);
        
        // Check if the request is coming from admin route
        if (request()->is('admin/kegiatan*')) {
            return view('Admin.Kegiatan', compact('kegiatans'));
        }
        
        // Return public view for non-admin routes
        return view('user.activities.index', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'tempat' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
        ]);

        Kegiatan::create($request->all());

        session()->flash('success', 'Data Kegiatan berhasil ditambahkan!');
        return redirect()->route('admin.kegiatan.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'tempat' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($request->all());

        session()->flash('success', 'Data Kegiatan berhasil diperbarui!');
        return redirect()->route('admin.kegiatan.index');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        session()->flash('success', 'Data Kegiatan berhasil dihapus!');
        return redirect()->route('admin.kegiatan.index');
    }
}
