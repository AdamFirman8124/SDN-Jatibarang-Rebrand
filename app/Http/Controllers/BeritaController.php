<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('user.news.index', compact('beritas'));
    }

    public function indexAdmin()
    {
        $beritas = Berita::with('gallery')->get();
        return view('Admin.Berita', compact('beritas'));
    }

    public function create()
    {
        return view('berita.create');
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:50',
            'penulis' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan gambar ke storage
        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/berita'), $imageName);


        // Simpan ke tabel Gallery
        $gallery = Gallery::create([
            'path' => 'images/berita/' . $imageName,
        ]);

        // Simpan ke tabel Berita dengan ID gallery
        Berita::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
            'gallery_id' => $gallery->id, // asumsikan kolom ini ada di tabel berita
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Cari data Berita berdasarkan id
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:50',
            'penulis' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',  // gambar optional saat update
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/berita'), $imageName);

            // Update gallery jika ada
            if ($berita->gallery) {
                $berita->gallery->update(['path' => 'images/berita/' . $imageName]);
            } else {
                // Jika tidak ada gallery, buat baru
                $gallery = Gallery::create(['path' => 'images/berita/' . $imageName]);
                $berita->gallery_id = $gallery->id;
            }
        }

        // Update data berita
        $berita->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
            // gallery_id hanya diupdate jika ada gambar baru
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Hapus gallery jika ada
        if ($berita->gallery) {
            $berita->gallery->delete();
        }
        
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
