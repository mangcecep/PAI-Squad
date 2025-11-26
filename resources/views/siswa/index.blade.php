@extends('layouts.dashboard')

@section('content')

<h2 class="title">Siswa</h2>
<div class="subtitle">Dashboard / Siswa</div>

<div style="margin-top:20px; border:1px solid #ddd; padding:15px; border-radius:10px;">

    <div style="display:flex; justify-content:space-between; margin-bottom:15px;">
        <strong>Data Siswa</strong>

        <a href="{{ route('siswa.create') }}"
           style="background:#0A84FF; padding:8px 12px; color:white; text-decoration:none; border-radius:8px;">
            + Tambah Siswa
        </a>
    </div>

    <input type="text" placeholder="Search..."
        style="padding:8px 12px; width:200px; border-radius:6px; border:1px solid #ccc; margin-bottom:15px;">

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f7f7f7; text-align:left;">
                <th style="padding:10px; border:1px solid #ddd;">No</th>
                <th style="padding:10px; border:1px solid #ddd;">Foto</th>
                <th style="padding:10px; border:1px solid #ddd;">NIS</th>
                <th style="padding:10px; border:1px solid #ddd;">Nama</th>
                <th style="padding:10px; border:1px solid #ddd;">Kelas</th>
                <th style="padding:10px; border:1px solid #ddd;">Jurusan</th>
                <th style="padding:10px; border:1px solid #ddd;">Alamat</th>
                <th style="padding:10px; border:1px solid #ddd; width:120px; text-align:center;">Operasi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($siswas as $siswa)
            <tr>
                <td style="padding:10px; border:1px solid #ddd;">{{ $loop->iteration }}</td>

                <td style="padding:10px; border:1px solid #ddd;">
                    <img src="{{ $siswa->foto ? asset('foto_siswa/'.$siswa->foto) : asset('foto_default.png') }}"
                        style="width:60px; height:60px; border-radius:50%; object-fit:cover;">
                </td>

                <td style="padding:10px; border:1px solid #ddd;">{{ $siswa->nis }}</td>
                <td style="padding:10px; border:1px solid #ddd;">{{ $siswa->nama }}</td>
                <td style="padding:10px; border:1px solid #ddd;">{{ $siswa->kelas }}</td>
                <td style="padding:10px; border:1px solid #ddd;">{{ $siswa->jurusan }}</td>
                <td style="padding:10px; border:1px solid #ddd;">{{ $siswa->alamat }}</td>

                {{-- TOMBOL EDIT & DELETE RAPIH --}}
                <td style="padding:10px; border:1px solid #ddd; text-align:center;">

                    {{-- EDIT BUTTON --}}
                    <a href="{{ route('siswa.edit', $siswa->id) }}"
                        style="
                            background:#1d72ff;
                            padding:6px 10px;
                            border-radius:6px;
                            color:white;
                            text-decoration:none;
                            margin-right:6px;
                            display:inline-block;
                        ">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    {{-- DELETE BUTTON --}}
                    <form action="{{ route('siswa.destroy', $siswa->id) }}"
                        method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Hapus data siswa?')"
                            style="
                                background:#e63946;
                                padding:6px 10px;
                                border-radius:6px;
                                color:white;
                                border:none;
                                cursor:pointer;
                            ">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
