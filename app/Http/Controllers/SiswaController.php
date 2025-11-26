<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        // =============================
        // UPLOAD FOTO
        // =============================
        $namaFoto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            $namaFoto = time() . '_' . $file->getClientOriginalName();

            // simpan ke public/foto_siswa
            $file->move(public_path('foto_siswa'), $namaFoto);
        }

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'foto' => $namaFoto, // simpan nama file
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $namaFoto = $siswa->foto;

        // =============================
        // UPDATE FOTO JIKA ADA FOTO BARU
        // =============================
        if ($request->hasFile('foto')) {

            // hapus foto lama (opsional)
            if ($siswa->foto && file_exists(public_path('foto_siswa/' . $siswa->foto))) {
                unlink(public_path('foto_siswa/' . $siswa->foto));
            }

            $file = $request->file('foto');
            $namaFoto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_siswa'), $namaFoto);
        }

        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'foto' => $namaFoto,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // hapus foto
        if ($siswa->foto && file_exists(public_path('foto_siswa/' . $siswa->foto))) {
            unlink(public_path('foto_siswa/' . $siswa->foto));
        }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
