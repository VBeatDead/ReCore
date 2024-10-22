<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SesiController extends Controller
{

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|min:6|email',
                'password' => 'required|min:6|max:21',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
                'email.email' => 'Format email tidak valid',
            ]
        );

        $email = $request->email;
        $password = $request->password;
        $user = \App\Models\User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email tidak terdaftar'])->withInput();
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } elseif (Auth::user()->role == 'in') {
                return redirect('/in');
            } elseif (Auth::user()->role == 'user') {
                return redirect('/');
            }
        } else {
            return redirect()->back()->withErrors(['password' => 'Password salah'])->withInput();
        }

        return redirect()->back()->withErrors(['email' => 'Email dan Password tidak valid'])->withInput();
    }

    function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|min:6|unique:users,email',
            'password' => 'required|min:6|max:21|confirmed',
        ], [
            'name.required' => 'Name wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.max' => 'Password maximal 21 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->save();

        Auth::login($user);

        return redirect('')->with('success', 'Registrasi berhasil! Selamat datang di aplikasi.');
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
