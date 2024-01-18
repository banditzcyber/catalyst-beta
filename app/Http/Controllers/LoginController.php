<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Models\User;
use myPHPnotes\Microsoft\Handlers\Session;

class LoginController extends Controller
{
    public function signInForm()
    {
        return view('auth.sign-in');
    }
    
    public function formLogin()
    {
        return view('auth.index', [
            'favicon'   => 'Login'
        ]);
    }

    

    public function microsoftOAuth()
    {
        $microsoft = new Auth(env('TENANT_ID'),env('CLIENT_ID'),env('CLIENT_SECRET'),env('CALLBACK_URL') ,["User.Read"]);

        $url = $microsoft->getAuthUrl();

        return redirect($url);
    }

    public function microsoftOAuthCallback(Request $request)
    {

        $microsoft = new Auth(env('TENANT_ID'),env('CLIENT_ID'),env('CLIENT_SECRET'),env('CALLBACK_URL') ,["User.Read"]);

        $tokens = $microsoft->getToken($request->code);

        $accessToken = $tokens->access_token;

        $microsoft->setAccessToken($accessToken);

        $user = new User;

        $name = $user->data->getDisplayName();
        $email = $user->data->getUserPrincipalName();

        $query = DB::table('employees')->where('email', $email)->first();


        dd($name,$email, $query->employee_name);
    }


    public function loginAzure()
    {
        return Socialite::driver('azure')->redirect();
    }

}
