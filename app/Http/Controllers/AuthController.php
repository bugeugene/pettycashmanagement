<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
//    public function showRegister(){
//         return view('/auth/register');
//    }

   public function showLogin(){
        return view('/auth/login');
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

          $role = Auth::user()->role;
          switch ($role) {
              case 'Requester':
                  return redirect('/category');
              case 'Finance':
                  return redirect('/entries');
              case 'Admin':
                  return redirect('/users');
              default:
                  Auth::logout();
                  return redirect('/login');
          }
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
