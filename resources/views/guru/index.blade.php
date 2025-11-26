@extends('layouts.dashboard')

@section('content')

<div class="container" style="padding: 20px;">

    <h2 style="font-size: 28px; font-weight: 700;">Guru</h2>
    <div style="color: gray; margin-top: -5px;">Dashboard / Guru</div>

    <div style="
        background: #f5f5f5;
        padding: 10px 15px;
        margin-top: 25px;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    ">
        <div style="font-weight: 600;">
            ● Data Guru
        </div>

        <a href="{{ route('guru.create') }}"
            style="background: #1d3557; color:white; padding:8px 18px; border-radius:5px; text-decoration:none;">
            + Tambah Guru
        </a>
    </div>

    {{-- TABLE --}}
    <div style="margin-top:20px; background:white; padding:20px; border-radius:8px;">
        <table style="width:100%; border-collapse:collapse;">

            <thead>
                <tr style="background:#f7f7f7; text-align:left;">
                    <th style="padding:10px; border:1px solid #ddd;">Foto</th>
                    <th style="padding:10px; border:1px solid #ddd;">NIP</th>
                    <th style="padding:10px; border:1px solid #ddd;">Nama</th>
                    <th style="padding:10px; border:1px solid #ddd;">Telpon</th>
                    <th style="padding:10px; border:1px solid #ddd;">Mapel</th>
                    <th style="padding:10px; border:1px solid #ddd;">Alamat</th>
                    <th style="padding:10px; border:1px solid #ddd; width:120px; text-align:center;">Operasi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($gurus as $guru)
                <tr>
                    <td style="padding:10px; border:1px solid #ddd;">
                        <img src="{{ $guru->foto ? asset('foto_guru/'.$guru->foto) : asset('foto_default.png') }}"
                             style="width:60px; height:60px; border-radius:50%; object-fit:cover;">
                    </td>

                    <td style="padding:10px; border:1px solid #ddd;">{{ $guru->nip }}</td>
                    <td style="padding:10px; border:1px solid #ddd;">{{ $guru->nama }}</td>
                    <td style="padding:10px; border:1px solid #ddd;">{{ $guru->telpon }}</td>
                    <td style="padding:10px; border:1px solid #ddd;">{{ $guru->mapel }}</td>
                    <td style="padding:10px; border:1px solid #ddd;">{{ $guru->alamat }}</td>

                    {{-- OPERASI (EDIT & DELETE) --}}
                    <td style="padding:10px; border:1px solid #ddd; text-align:center;">

                        {{-- BUTTON EDIT --}}
                        <a href="{{ route('guru.edit', $guru->id) }}"
                           style="background:#1d4ed8; padding:6px 10px; border-radius:5px; 
                           color:white; text-decoration:none; margin-right:5px; display:inline-block;">
                            <i class="fa fa-pen"></i>
                        </a>

                        {{-- BUTTON DELETE --}}
                        <form action="{{ route('guru.destroy', $guru->id) }}"
                              method="POST" style="display:inline-block;"
                              onsubmit="return confirm('Hapus data guru?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                style="background:#dc2626; padding:6px 10px; 
                                border-radius:5px; color:white; border:none; cursor:pointer;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

@endsection
