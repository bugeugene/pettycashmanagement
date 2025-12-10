<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
   public function showRegister(){
        return view('/auth/register');
   }

   public function showLogin(){
        return view('/auth/login');
   }

   public function register(Request $request){
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string'
        ]);

        $users = User::create($validated);
        Auth::login($users);

        return redirect('/login');
   }
   
   public function login(Request $request){
        $validated = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt([
        'username' => $validated['username'],
        'password' => $validated['password']
    ])) {
        $request->session()->regenerate();

        return redirect('/dashboard'); 
    }

    throw ValidationException::withMessages([
        'credentials' => 'Sorry, wrong credentials'
    ]);
}
   
   public function logout(Request $request){
     Auth::logout();

     $request->session()->invalidate();
     $request->session()->regenerateToken();

     return redirect('/login');
   }
}
