<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function indexAdmin(Request $request)
    {
        // Ambil semua data staff
        $staff = Staff::all();

        return view('Admin.GuruStaff', compact('staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'NIP' => 'nullable|string|unique:staff,NIP',
            'jabatan' => 'required|in:Guru,Staff,Kepala Sekolah,Wakil Kepala Sekolah',
            'pekerjaan' => 'nullable|string|max:255',
        ]);

        $data = new Staff();
        $data->nama = $request->nama;
        $data->NIP = $request->NIP;
        $data->jabatan = $request->jabatan;
        $data->pekerjaan = $request->pekerjaan;
        $data->save();

        session()->flash('success', 'Data staff berhasil ditambahkan!');
        return redirect()->intended(route('admin.staff.index'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'NIP' => 'nullable|string|unique:staff,NIP,' . $id,
            'jabatan' => 'required|in:Guru,Staff,Kepala Sekolah,Wakil Kepala Sekolah',
            'pekerjaan' => 'nullable|string|max:255',
        ]);

        $data = Staff::findOrFail($id);
        $data->nama = $request->nama;
        $data->NIP = $request->NIP;
        $data->jabatan = $request->jabatan;
        $data->pekerjaan = $request->pekerjaan;
        $data->save();

        session()->flash('success', 'Data staff berhasil diperbarui!');
        return redirect()->intended(route('admin.staff.index'));
    }

    public function destroy($id)
    {
        try {
            $data = Staff::findOrFail($id);

            // Check if staff is assigned to any class
            if ($data->kelas()->exists()) {
                session()->flash('error', 'Tidak dapat menghapus staff yang masih menjadi wali kelas!');
                return redirect()->intended(route('admin.staff.index'));
            }

            $data->delete();
            session()->flash('success', 'Data staff berhasil dihapus!');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus data staff!');
        }

        return redirect()->intended(route('admin.staff.index'));
    }
}
