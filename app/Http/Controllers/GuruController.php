<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:gurus',
            'nama' => 'required',
            'telpon' => 'required',
            'mapel' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('foto_guru'), $namaFoto);
        }

        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'telpon' => $request->telpon,
            'mapel' => $request->mapel,
            'alamat' => $request->alamat,
            'foto' => $namaFoto
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'telpon' => 'required',
            'mapel' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $namaFoto = $guru->foto;

        if ($request->hasFile('foto')) {

            if ($guru->foto && file_exists(public_path('foto_guru/'.$guru->foto))) {
                unlink(public_path('foto_guru/'.$guru->foto));
            }

            $file = $request->file('foto');
            $namaFoto = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('foto_guru'), $namaFoto);
        }

        $guru->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'telpon' => $request->telpon,
            'mapel' => $request->mapel,
            'alamat' => $request->alamat,
            'foto' => $namaFoto,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto && file_exists(public_path('foto_guru/'.$guru->foto))) {
            unlink(public_path('foto_guru/'.$guru->foto));
        }

        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus!');
    }
}
