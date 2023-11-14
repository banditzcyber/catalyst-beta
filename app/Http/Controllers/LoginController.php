<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.index', [
            'favicon'   => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'         => 'required',
            'password'      => 'required'
        ]);



        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(auth()->user()->role_id == 1){
                return redirect()->intended('/profileEmploy');
            }elseif(auth()->user()->role_id == 2){
                return redirect()->intended('/profileEmploy');
            }elseif(auth()->user()->role_id == 3){
                return redirect()->intended('/departmentDashboard');
            }elseif(auth()->user()->role_id == 4){
                return redirect()->intended('/dashboardDivisi');
            }elseif(auth()->user()->role_id == 5){
                return redirect()->intended('/dashboardFunct');
            }elseif(auth()->user()->role_id == 6){
                return redirect()->intended('/dashboard');
            }
        }

        return back()->with('loginErorr', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
