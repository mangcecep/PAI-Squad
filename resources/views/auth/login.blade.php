@extends('layouts.auth')

@section('content')
<div class="auth-card">

    <h2 class="title">Login Kurikulum PI</h2>

    @if(session('error'))
    <div style="color: red; font-size: 13px; margin-bottom: 10px;">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div class="input-box">
            <input type="text" name="username" placeholder="Email / Username" required>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button class="btn-login">Login</button>

        <div class="link-box">
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('forgot') }}">Forgot Password?</a>
        </div>

    </form>
</div>
@endsection
