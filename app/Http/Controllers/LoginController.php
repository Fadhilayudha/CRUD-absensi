<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() 
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],[
            'username.exists' => 'Username doesnt exist yet',
            'username.required' => 'Username must be filled',
            'password.required' => 'Password must be filled',
        ]);

        $user = $request->only('username','password');
        if(Auth::attempt($user)) {
            return redirect()->route('dashboard');
        }else {
            return redirect()->back()->with('error','Gagal login, silahkan cek dan coba lagi!');
        }
        return redirect()->route('dashboard')->with('successAdd', 'Anda Berhasil Login!');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerAccount(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email'=>'required|email:dns',
            'username'=>'required|min:4|max:8',
            'password'=>'required|min:4',
            'name'=>'required|min:3',
        ],[
            'username.required' => 'E-mail must be filled',
            'username.required' => 'Username must be filled',
            'password.required' => 'Password must be filled',
            'name.required' => 'Name must be filled',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role' => 'user',
        ]);

        return redirect('/')->with('success','Successfully added account! Please login');

    }
}
