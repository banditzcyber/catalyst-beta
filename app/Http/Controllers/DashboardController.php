<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employee   = DB::table('employees')
                        ->count();

        dd($employee);
        return view('admin.dashboard.index', [
            'title'     => 'Dashboard',
            'employee'  => $employee
        ]);
    }
}
