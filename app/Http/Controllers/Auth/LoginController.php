<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request,[
           'email' => 'required|email',
           'password' => 'required|min:8'
        ]);

        Auth::attempt($request->only('email','password'), $request->remember);

        return redirect()->route('timeline');
    }

    public function logout(){
        \auth()->logout();

        return redirect()->route('login.form');
    }
}
