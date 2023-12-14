<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Models\User;

class LoginController extends Controller
{
    public function indexq()
    {
        return view('auth.index', [
            'favicon'   => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {

        dd($request);


        $credentials = $request->validate([
            'email'         => 'required',
            'password'      => 'required'
        ]);



        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role_id == 1) {
                return redirect()->intended('/profileEmploy');
            } elseif (auth()->user()->role_id == 2) {
                return redirect()->intended('/profileEmploy');
            } elseif (auth()->user()->role_id == 3) {
                return redirect()->intended('/departmentDashboard');
            } elseif (auth()->user()->role_id == 4) {
                return redirect()->intended('/dashboardDivisi');
            } elseif (auth()->user()->role_id == 5) {
                return redirect()->intended('/dashboardFunct');
            } elseif (auth()->user()->role_id == 6) {
                return redirect()->intended('/dashboard');
            }
        }

        return back()->with('loginErorr', 'Login Failed!');
    }

    public function index(Request $request)
    {
        $appId = '5c2ce04a-9305-468d-9fe1-cb5e071e8c44';
        $tennantId = 'a289e960-a538-4db3-adf0-845b57e616cf';
        $redirectUri = 'https://mycatalyst.capcx.com/authenticate';
        $scope = 'https://graph.microsoft.com/User.Read';
        $secret = 'aa05fef4-1ab4-48e5-b805-15e430aad22d';

        session_start();

        // Check if already authenticated
        if (session('msatg')) {
            return view('authenticated', ['uname' => session('uname')]);
        }

        // Check if the user is logging in
        $params = [
            'client_id' => $appId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'token',
            'response_mode' => 'form_post',
            'scope' => $scope,
            'state' => session()->getId(),
        ];

        return redirect()->to("https://login.microsoftonline.com/$tennantId/oauth2/v2.0/authorize?" . http_build_query($params));
        // if ($request->query('action') == 'login') {
        // }

        // Check if the access token is present in the request
        if ($request->has('access_token')) {
            $accessToken = $request->input('access_token');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ])->get('https://graph.microsoft.com/v1.0/me/');

            $rez = $response->json();

            if (isset($rez['error'])) {
                var_dump($rez['error']);
                die();
            } else {
                session(['msatg' => true, 'uname' => $rez['displayName'], 'id' => $rez['id']]);
            }

            // You can add further logic here based on the authentication result
            return view('authenticated', ['uname' => session('uname')]);
        }

        // Check if the user is logging out
        if ($request->query('action') == 'logout') {
            session()->forget(['msatg', 'uname', 'id']);
            return 'Logged out';
        }

        // Display default view
        return view('auth/azure');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function microsoftOAuth()
    {
        $microsoft = new Auth(env('TENANT_ID'), env('CLIENT_ID'), env('CLIENT_SECRET'), env('CALLBACK_URL'), ["User.Read"]);

        $url = $microsoft->getAuthUrl();

        return redirect($url);
    }

    public function microsoftOAuthCallback(Request $request)
    {
        $microsoft = new Auth(env('TENANT_ID'), env('CLIENT_ID'), env('CLIENT_SECRET'), env('CALLBACK_URL'), ["User.Read"]);

        $tokens = $microsoft->getToken($request->code);

        $accessToken = $tokens->access_token;

        $microsoft->setAccessToken($accessToken);

        $user = new User;

        $name = $user->data->getDisplayName();
        $email = $user->data->getUserPrincipalName();

        dd($name, $email);
    }
}
