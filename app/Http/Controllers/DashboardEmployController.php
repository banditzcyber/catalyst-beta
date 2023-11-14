<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardEmployController extends Controller
{
    public function index()
    {
        return view('employee.dashboard.index', [
            'title'     => 'ini dashboard employee, lu gk usah ngaku-ngaku'
        ]);
    }
}
