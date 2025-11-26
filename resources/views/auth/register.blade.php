@extends('layouts.auth')

@section('content')
<div class="auth-card">

    <h2 class="title">Register</h2>

    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <div class="input-box">
            <input type="text" name="name" placeholder="Name" required>
        </div>

        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="input-box">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <button class="btn-login">Register</button>

        <div class="link-box">
            <a href="{{ route('login') }}">Kembali ke Login</a>
        </div>

    </form>
</div>
@endsection
