<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login()
    {
        return view('login', ['title'=>'Login']);
    }
    function loginProsesing(Request $request)
    {
        if (auth()->attempt(collect($request)->except('_token')->toArray())) return redirect('/');
        return redirect()->back()->with('error', 'Sorry email or password wrong');
    }

    function register()
    {
        return view('register', ['title'=>'Register']);
    }
    function registerProsessing(Request $request)
    {
        $request->validate([
            'name'              => ['required','min:8'],
            'email'             => ['email', 'unique:users'],
            'password'          => ['required','min:8'],
            'confirm-password'  => ['same:password'],
        ]);
        $request['password'] = bcrypt($request['password']);
        User::create(collect($request)->except(['confirm-password', '_token'])->toArray());
        return redirect('/login')->with('success', 'Your email successfull created');
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
