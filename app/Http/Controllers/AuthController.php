<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // ===========================
    // SHOW LOGIN PAGE
    // ===========================
    public function showLogin()
    {
        return view('auth.login');
    }

    // ===========================
    // LOGIN PROCESS
    // ===========================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    // ===========================
    // SHOW REGISTER PAGE
    // ===========================
    public function showRegister()
    {
        return view('auth.register');
    }

    // ===========================
    // REGISTER PROCESS
    // ===========================
    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'username'  => 'required|unique:users',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:5|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => $request->password, 
            'role'     => 'admin',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    // ===========================
    // LOGOUT
    // ===========================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // ===========================
    // SHOW FORGOT PASSWORD PAGE
    // ===========================
    public function showForgot()
    {
        return view('auth.forgot');
    }

    // ===========================
    // SEND RESET TOKEN
    // ===========================
    public function sendReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan!');
        }

        // generate kode reset
        $token = rand(100000, 999999);

        $user->reset_token = $token;
        $user->save();

        return redirect()->route('reset')->with('success', 'Kode reset dikirim! Gunakan kode: '.$token);
    }

    // ===========================
    // SHOW RESET PASSWORD PAGE
    // ===========================
    public function showReset()
    {
        return view('auth.reset');
    }

    // ===========================
    // RESET PASSWORD PROCESS
    // ===========================
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::where('email', $request->email)
                    ->where('reset_token', $request->token)
                    ->first();

        if (!$user) {
            return back()->with('error', 'Kode reset salah atau email salah!');
        }

        // update password
        $user->password = $request->password;
        $user->reset_token = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Password berhasil direset!');
    }
}
