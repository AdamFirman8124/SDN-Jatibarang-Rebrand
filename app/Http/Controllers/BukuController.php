<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::latest()->get();
        return view('Admin.Buku', compact('bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        Buku::create($request->all());

        session()->flash('success', 'Data Buku berhasil ditambahkan!');
        return redirect()->route('admin.buku.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        session()->flash('success', 'Data Buku berhasil diperbarui!');
        return redirect()->route('admin.buku.index');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        session()->flash('success', 'Data Buku berhasil dihapus!');
        return redirect()->route('admin.buku.index');
    }
    
    // Metode untuk menampilkan halaman buku kelas 1-6
    public function showBukuKelas1()
    {
        return view('user.books.grade1.index');
    }
    
    public function showBukuKelas2()
    {
        return view('user.books.grade2.index');
    }
    
    public function showBukuKelas3()
    {
        return view('user.books.grade3.index');
    }
    
    public function showBukuKelas4()
    {
        return view('user.books.grade4.index');
    }
    
    public function showBukuKelas5()
    {
        return view('user.books.grade5.index');
    }
    
    public function showBukuKelas6()
    {
        return view('user.books.grade6.index');
    }
}
