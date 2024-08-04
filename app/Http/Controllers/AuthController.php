<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('layout.login');
    }

    public function viewRegister()
    {
        return view('layout.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->id_role == '1') {
                return redirect()->route('dashboard-admin')->withInput(['email' => $request->input('email')]);
            } elseif ($user->id_role == '2') {
                return redirect()->route('dashboard-pendaftaran')->withInput(['email' => $request->input('email')]);
            } elseif ($user->role == 'Superadmin') {
                return redirect()->route('superadmin.dashboard')->withInput(['email' => $request->input('email')]);
            } else {
                Auth::logout();
                return redirect()->route('view-login')->with('error', 'Anda tidak memiliki akses');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'id_role' => 2,
        ]);

        return redirect()->route('view-login')->with('success', 'Registrasi berhasil');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('view-login');
    }
}
