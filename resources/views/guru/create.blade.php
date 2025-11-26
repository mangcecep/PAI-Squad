@extends('layouts.dashboard')

@section('content')

<div class="container" style="padding:20px;">

    <h2 style="font-size:28px; font-weight:700;">Guru</h2>
    <div style="color:gray; margin-top:-5px;">Dashboard / Guru / Tambah Guru</div>

    <div style="
        background:#f5f5f5; padding:10px 15px; margin-top:25px;
        border-radius:5px; display:flex; justify-content:space-between; align-items:center;
    ">
        <div style="font-weight:600;">● Tambah Guru</div>

        <button onclick="document.getElementById('form').reset()"
            style="padding:8px 18px; background:#e63946; border:none; color:white; border-radius:5px;">
            Reset
        </button>
    </div>

    <form id="form" action="{{ route('guru.store') }}" method="POST"
          enctype="multipart/form-data"
          style="background:white; padding:25px; border-radius:8px; margin-top:20px;">
        @csrf

        <div style="display:flex; gap:40px;">

            <div style="flex:2;">
                <div class="form-input">
                    <label>NIP</label>
                    <input type="text" name="nip" required>
                </div>

                <div class="form-input">
                    <label>Nama</label>
                    <input type="text" name="nama" required>
                </div>

                <div class="form-input">
                    <label>Telpon</label>
                    <input type="text" name="telpon" required>
                </div>

                <div class="form-input">
                    <label>Mata Pelajaran</label>
                    <input type="text" name="mapel" required>
                </div>

                <div class="form-input">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="4"></textarea>
                </div>
            </div>

            <div style="flex:1; text-align:center;">
                <img src="/foto_default.png"
                     style="width:120px; height:120px; border-radius:50%; object-fit:cover; border:2px solid #ddd;">

                <input type="file" name="foto" style="margin-top:15px;">
                <div style="font-size:12px; color:gray;">Pilih foto PNG, JPG, JPEG</div>

            </div>

        </div>

        <button style="margin-top:20px; background:#1d3557; color:white; padding:10px 20px; border:none; border-radius:5px;">
            Simpan
        </button>

    </form>

</div>

<style>
    .form-input { margin-bottom:18px; }
    .form-input label { font-weight:600; display:block; margin-bottom:4px; }
    .form-input input, .form-input textarea {
        width:100%; padding:10px; border-radius:6px;
        border:1px solid #ccc; background:#fafafa;
    }
</style>

@endsection
