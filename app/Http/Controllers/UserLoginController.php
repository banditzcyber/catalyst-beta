<?php

namespace App\Http\Controllers;

use App\Models\UserLogin;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{

    public function index(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $search = DB::table('users')->orderby('id', 'desc');

        if(request('search')) {
            $search->where('employee_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employee_name', 'like', '%' . request('search') . '%');
        }


        return view('admin.userlogin.index', [
            'title'     => 'User Login',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'      => $search->get()
        ]);
    }


    public function create(Request $request)
    {

        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $data = DB::table('employees');

        return view('admin.userlogin.create', [
            'title'     => 'Add user login',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'      => $data->get()
        ]);
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'employee_id'   => 'required',
            'employee_name' => 'required',
            'email'         => 'required|email:dns|unique:users',
            'password'      => 'required|min:5|max:255',
            'role_id'       => 'required'
        ]);

        $validation['password'] = Hash::make($validation['password']);

        DB::table('users')->insert($validation);
        return redirect('/userlogin')->with('success', 'Data has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @return \Illuminate\Http\Response
     */
    public function show(UserLogin $userLogin)
    {
        //
    }


    public function editData(Request $request, $id)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $user =  DB::table('users')->where('id', $id)->first();
        $data = DB::table('employees');

        return view('admin.userLogin.edit', [
            'data'      => $data->get(),
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'user'      => $user,
            'title'     => 'Edit Data User',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserLogin  $userLogin
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request)
    {


        $validation = $request->validate([
            'employee_id'   => 'required',
            'employee_name' => 'required',
            'email'         => 'required|email:dns',
            'password'      => 'required|min:5|max:255',
            'role_id'       => 'required'
        ]);

        $validation['password'] = Hash::make($validation['password']);

        $id     = $request->input('user_id');
        // dd($id);
        DB::table('users')->where('id', $id)->update($validation);

        return redirect('/userlogin')->with('success', 'Data has been updated!');
    }


    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/userlogin')->with('success', 'Data has been deleted!');
    }
}
