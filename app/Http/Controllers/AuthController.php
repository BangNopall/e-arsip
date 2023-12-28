<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->with('error', 'Login gagal, Email tidak ditemukan!');
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = auth()->user();
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Login gagal, silahkan cek email dan password Anda!');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nik' => 'required|min:16',
            'jabatan' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email|email:dns',
            'nohp' => 'required|min:8',
            'password' => 'required|min:6',
            'passwordconfirm' => 'required|min:6',
        ]);

        if ($request->password !== $request->passwordconfirm) {
            return redirect()->back()->withErrors(['passwordconfirm' => 'Password tidak sesuai']);
        }

        // hasing password dengan bcrypt
        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = new User();
        $user->nik = $validatedData['nik'];
        $user->jabatan = $validatedData['jabatan'];
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->nohp = $validatedData['nohp'];
        $user->password = $validatedData['password'];
        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silahkan login!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
