<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function index()
    {
        return view('login-form');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        // jika password salah
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah.');
        }

        // jika berhasil login
        // (biasanya set session dulu)
        session(['user_id' => $user->id]);

        return redirect()->route('dashboard');
    }
}
