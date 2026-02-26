<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use DateTime;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'string|max:50|required',
            'last_name' => 'string|max:50|required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $isAdmin = User::count() === 0;
        
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => new DateTime(),
            'is_admin' => $isAdmin,
        ]);
        return redirect()->route('login')->with('success', 'Account created');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return view('welcome');
        }
        return back()->withErrors([
            'email' => 'invalid credentials'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
