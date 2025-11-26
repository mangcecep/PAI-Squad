@extends('layouts.auth')

@section('content')
<div class="auth-card">

    <h2 class="title">Forgot Password</h2>

    @if(session('error'))
        <p style="color:red; font-size:13px;">{{ session('error') }}</p>
    @endif

    @if(session('success'))
        <p style="color:green; font-size:13px;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('forgot.send') }}" method="POST">
        @csrf

        <div class="input-box">
            <input type="email" name="email" placeholder="Masukkan Email" required>
        </div>

        <button class="btn-login">Kirim Kode Reset</button>

        <div class="link-box">
            <a href="{{ route('login') }}">Kembali ke Login</a>
        </div>

    </form>
</div>
@endsection
