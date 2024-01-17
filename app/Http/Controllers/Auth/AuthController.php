<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Dcblogdev\MsGraph\Facades\MsGraph;
// use Dcblogdev\MsGraph\Models\MsGraphToken;
// use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.sign-in');
    }

    public function connect()
    {
        // dd('testing');
        return MsGraph::connect();
    }

    public function logout()
    {
        return MsGraph::disconnect('/');
    }

    public function redirectToMicrosoft()
    {
        return Socialite::driver('azure')->redirect();
    }

    public function handleMicrosoftCallback()
    {
        $user = Socialite::driver('azure')->user();

        // Use $user to login or register the user in your application

        return redirect('/home');
    }

    
}