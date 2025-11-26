@extends('layouts.auth')

@section('content')
<div class="auth-card">

    <h2 class="title">Reset Password</h2>

    @if(session('success'))
        <p style="color:green;font-size:13px;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red;font-size:13px;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('reset.process') }}" method="POST">
        @csrf

        <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-box">
            <input type="text" name="token" placeholder="Kode Reset" required>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password Baru" required>
        </div>

        <div class="input-box">
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
        </div>

        <button class="btn-login">Reset Password</button>

        <div class="link-box">
            <a href="{{ route('login') }}">Kembali Login</a>
        </div>

    </form>
</div>
@endsection
