@extends('layouts.dashboard')

@section('content')

<div class="container" style="padding: 20px;">

    {{-- TITLE --}}
    <h2 style="font-size: 28px; font-weight: 700;">Siswa</h2>
    <div style="color: gray; margin-top: -5px;">Dashboard / Siswa / Edit Siswa</div>

    {{-- HEADER CARD --}}
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
            ● Edit Siswa
        </div>

        <div>
            <a href="{{ route('siswa.index') }}" 
               style="padding: 8px 18px; border: none; background: #e63946; color: white; border-radius: 5px; cursor:pointer; text-decoration:none;">
                Kembali
            </a>

            <button form="form"
                style="padding: 8px 18px; border: none; background: #1d3557; color: white; border-radius: 5px; cursor:pointer;">
                Update
            </button>
        </div>
    </div>

    {{-- MAIN WHITE CARD --}}
    <div style="
        background: white;
        padding: 25px; 
        border-radius: 8px; 
        margin-top: 10px;
        min-height: 350px;">
        
        <form id="form" 
              action="{{ route('siswa.update', $siswa->id) }}" 
              method="POST" 
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div style="display: flex; gap: 40px;">

                {{-- LEFT FORM --}}
                <div style="flex: 2;">

                    <div class="form-input">
                        <label>NIS</label>
                        <input type="text" name="nis" value="{{ $siswa->nis }}" required>
                    </div>

                    <div class="form-input">
                        <label>Nama</label>
                        <input type="text" name="nama" value="{{ $siswa->nama }}" required>
                    </div>

                    <div class="form-input">
                        <label>Kelas</label>
                        <input type="text" name="kelas" value="{{ $siswa->kelas }}" required>
                    </div>

                    <div class="form-input">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" value="{{ $siswa->jurusan }}" required>
                    </div>

                    <div class="form-input">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="4" required>{{ $siswa->alamat }}</textarea>
                    </div>

                </div>

                {{-- RIGHT PREVIEW --}}
                <div style="flex: 1; text-align:center;">

                    <img id="imgPreview"
                        src="{{ $siswa->foto ? asset('foto_siswa/'.$siswa->foto) : asset('foto_default.png') }}"
                        style="width: 140px; height: 140px; object-fit:cover; border-radius:50%; border:3px solid #ddd;">

                    <input type="file" name="foto" id="foto"
                           onchange="previewFoto()" 
                           style="margin-top: 15px;">

                    <div style="font-size: 12px; color: gray;">
                        Pilih foto baru (opsional)
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>

{{-- FORM INPUT STYLE --}}
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

{{-- PREVIEW FOTO JS --}}
<script>
function previewFoto() {
    const foto = document.getElementById('foto').files[0];
    const imgPreview = document.getElementById('imgPreview');

    if (foto) {
        imgPreview.src = URL.createObjectURL(foto);
    }
}
</script>

@endsection
