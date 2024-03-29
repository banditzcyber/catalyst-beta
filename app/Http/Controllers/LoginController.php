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

        $query      = DB::table('employees')->where('email', $email)->first();

        if (!empty($query->employee_id)) {
            $request->session()->regenerate();
            $request->session()->put([
                'user' => $query->employee_id,
                'local' =>  'azure',
                'roleId' => 0
            ]);
            if ($query->job_level != 'SM' && $query->job_level != 'DM' && $query->job_level != 'GM' ) {
                return redirect()->intended('/profileEmploy');
            } elseif ($query->job_level == 'SM') {
                return redirect()->intended('/profileEmploy');
            } elseif ($query->job_level == 'DM') {
                return redirect()->intended('/departmentDashboard');
            } elseif ($query->job_level == 'GM') {
                return redirect()->intended('/dashboardDivisi');
            } elseif ($query->job_level == 5) {
                return redirect()->intended('/dashboardFunct');
            } elseif ($query->job_level == 6) {
                return redirect()->intended('/dashboard');
            }
        }
        return back()->with('loginErorr', 'Login Failed!');


        // dd($name,$email, $query->job_level, $request->session()->get('user'));
    }


    public function loginAzure()
    {
        return Socialite::driver('azure')->redirect();
    }

}
