<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index(){
    return view('login',[
        'title' => 'Login',
        'active' => 'login'
    ]);
  }  
  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
        'username' => 'required|min:4',
        'password' => 'required'
    ]);
    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
    return back()->with('loginError', 'Login Gagal');
  }
  public function logout()
  {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login')->with('logout','Anda telah keluar dari akun!');
  }
}
  
