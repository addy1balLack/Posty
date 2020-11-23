<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){

        $this->validate($request,[
           'name' => 'required',
           'username' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required|confirmed|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make(\request()->password)
        ]);

        Auth::attempt($request->only('email','password'));

        return redirect()->route('timeline');
    }
}
