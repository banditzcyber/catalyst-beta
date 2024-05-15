<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class LoginLocalController extends Controller
{
    public function formLogin(Request $request)
    {

        return view('auth.index', [
            'favicon'   => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'         => 'required',
            'password'      => 'required'
        ]);

        // $query      = DB::table('employees')->where('email', $credentials['email'])->first();
        $query2     = DB::table('users')->where('email', $credentials['email'])->first();




        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put([
                'user' => $query2->employee_id,
                'local' =>  'local'
            ]);
            $request->session()->put('roleId', $query2->role_id);
            if (auth()->user()->role_id == 1) {
                return redirect()->intended('/profileEmploy');
            } elseif (auth()->user()->role_id == 2) {
                return redirect()->intended('/profileEmploy');
            } elseif (auth()->user()->role_id == 3) {
                return redirect()->intended('/departmentDashboard');
            } elseif (auth()->user()->role_id == 4) {
                return redirect()->intended('/generalDashboard');
            } elseif (auth()->user()->role_id == 5) {
                return redirect()->intended('/dashboardFunct');
            } elseif (auth()->user()->role_id == 6) {
                return redirect()->intended('/dashboardFunct');
            }
        }

        return back()->with('loginErorr', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $request->session()->forget('user');

        return redirect('/');
    }
}
