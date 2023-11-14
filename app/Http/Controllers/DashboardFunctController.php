<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardFunctController extends Controller
{
    public function index()
    {
        $employee   = DB::table('employees')->count();
        $competencies  = DB::table('competencies')->count();
        $performance_standards   = DB::table('performance_standards')->count();
        $items   = DB::table('items')->count();

        return view('admin.dashboard.index', [
            'title'     => 'Dashboard',
            'employee'  => $employee,
            'competencies'  => $competencies,
            'performance_standards'  => $performance_standards,
            'items'  => $items,
        ]);
    }
}
