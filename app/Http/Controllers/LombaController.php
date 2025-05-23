<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function index()
    {
        $lombas = Lomba::latest()->paginate(6);
        
        // Check if the request is coming from admin route
        if (request()->is('admin/lomba*')) {
            return view('Admin.Lomba', compact('lombas'));
        }
        
        // Return public view for non-admin routes
        return view('user.competitions.index', compact('lombas'));
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
            'penyelenggara' => 'required|string|max:255',
        ]);

        Lomba::create($request->all());

        session()->flash('success', 'Data Lomba berhasil ditambahkan!');
        return redirect()->route('admin.lomba.index');
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
            'penyelenggara' => 'required|string|max:255',
        ]);

        $lomba = Lomba::findOrFail($id);
        $lomba->update($request->all());

        session()->flash('success', 'Data Lomba berhasil diperbarui!');
        return redirect()->route('admin.lomba.index');
    }

    public function destroy($id)
    {
        $lomba = Lomba::findOrFail($id);
        $lomba->delete();

        session()->flash('success', 'Data Lomba berhasil dihapus!');
        return redirect()->route('admin.lomba.index');
    }
}
