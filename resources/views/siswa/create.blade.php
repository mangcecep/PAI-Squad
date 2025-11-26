@extends('layouts.dashboard')

@section('content')

<div class="container" style="padding: 20px;">

    <h2 style="font-size: 28px; font-weight: 700;">Siswa</h2>
    <div style="color: gray; margin-top: -5px;">Dashboard / Siswa / Tambah Siswa</div>

    <!-- HEADER BAR -->
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
            ● Tambah Siswa
        </div>

        <div>
            <!-- RESET -->
            <button type="button"
                onclick="document.getElementById('form').reset();" 
                style="padding: 8px 18px; 
                border: none; 
                background: #e63946; 
                color: white; 
                border-radius: 5px; 
                cursor:pointer;">
                Reset
            </button>

            <!-- SUBMIT -->
            <button type="submit" form="form"
                style="padding: 8px 18px; 
                border: none; 
                background: #1d3557; 
                color: white; 
                border-radius: 5px; 
                cursor:pointer;">
                Simpan
            </button>
        </div>
    </div>

    <!-- FORM -->
    <form id="form" 
          action="{{ route('siswa.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          style="background: white; padding: 25px; border-radius: 8px; margin-top: 20px;">
        @csrf

        <div style="display: flex; gap: 40px;">

            <!-- LEFT SIDE -->
            <div style="flex: 2;">

                <div class="form-input">
                    <label>NIS</label>
                    <input type="text" name="nis" required>
                </div>

                <div class="form-input">
                    <label>Nama</label>
                    <input type="text" name="nama" required>
                </div>

                <div class="form-input">
                    <label>Kelas</label>
                    <input type="text" name="kelas" required>
                </div>

                <div class="form-input">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" required>
                </div>

                <div class="form-input">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="4"></textarea>
                </div>

            </div>

            <!-- RIGHT SIDE (PHOTO) -->
            <div style="flex: 1; text-align:center;">
                <img src="/foto_default.png" 
                     style="width: 120px; height: 120px; object-fit:cover; border-radius:50%; border:2px solid #ddd;">

                <input type="file" name="foto" 
                       style="margin-top: 15px;">
                <div style="font-size: 12px; color: gray;">Pilih foto PNG, JPG, JPEG</div>
            </div>

        </div>

    </form>
</div>

<!-- SIMPLE STYLE -->
<style>
    .form-input {
        margin-bottom: 18px;
    }
    .form-input label {
        font-weight: 600;
        display: block;
        margin-bottom: 4px;
    }
    .form-input input,
    .form-input textarea {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        background: #fafafa;
    }
</style>

@endsection
