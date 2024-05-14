<?php

namespace App\Http\Controllers;

use App\Models\DashboardSection;
use App\Models\ProfileEmploy;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;

class DepartDashboardController extends Controller
{

    public function index(Request $request)
    {

        // session (wajib);
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        // $idLogin        = '0773';
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        $assessments = [];
        $dSubordinate = DB::table('employees')->where('dm_code', $idLogin)->orWhere('employee_id', $idLogin);

        foreach ($dSubordinate->get() as $vSubordinate) {
            // Append the assessment to the assessments array
            $assessments[] = $vSubordinate->employee_id;
        }

        $baseQuery =  new \App\Models\ProfileEmploy();
        $qResult = $baseQuery->getSubordinate($assessments);

        $competent    = $baseQuery->getSubordinate($assessments)->where('ad.actual_result', 1)->count();
        $need_improve = $baseQuery->getSubordinate($assessments)->where('ad.actual_result', 2)->count();

        // dd($competent);

        if($competent == 0 or $need_improve == 0){
            $resultSum = 0;
        }else{
            $resultSum      = $competent / ($competent + $need_improve) * 100;
        }

        return view('department.dashboard.index', [
            'title'             => 'Dashboard',
            //penting
            'employeeSession'   => $dEmployee->first(),
            'employee'          => $dEmployee->get(),
            'area'              => $area,
            'roleId'            => $roleId,

            'percent'  => json_encode($resultSum),

        ]);
    }


}
