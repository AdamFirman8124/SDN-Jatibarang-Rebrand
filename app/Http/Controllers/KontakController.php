<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::latest()->get();
        return view('Admin.Kontak', compact('kontaks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        Kontak::create($request->all());

        session()->flash('success', 'Data Kontak berhasil ditambahkan!');
        return redirect()->route('admin.kontak.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $kontak = Kontak::findOrFail($id);
        $kontak->update($request->all());

        session()->flash('success', 'Data Kontak berhasil diperbarui!');
        return redirect()->route('admin.kontak.index');
    }

    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        session()->flash('success', 'Data Kontak berhasil dihapus!');
        return redirect()->route('admin.kontak.index');
    }
}
