<?php

namespace App\Http\Controllers;

use App\Models\SectionArea;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $dSubordinate = DB::table('employees')->where('dm_code', $idLogin);

        foreach ($dSubordinate->get() as $vSubordinate) {
            // Append the assessment to the assessments array
            $subEmployee[] = $vSubordinate->employee_id;
        }


        $baseQuery =  new \App\Models\DepartArea();
        $qResult = $baseQuery->getAssessment($subEmployee);

        $competent              = $baseQuery->getAssessment($subEmployee)->where('ad.actual_result', 1)->count();
        $need_improve           = $baseQuery->getAssessment($subEmployee)->where('ad.actual_result', 2)->count();
        $countLearning          = $baseQuery->getLearning($subEmployee)->count();
        $competenctLearning     = $baseQuery->getLearning($subEmployee)->where('l.status', 3)->count();
        $plannedLearning        = $baseQuery->getLearning($subEmployee)->where('l.status', 1)->count();

        if($competent == 0 or $need_improve == 0){
            $resultSum = 0;
        }else{
            $resultSum      = $competent / ($competent + $need_improve) * 100;
        }

        $qSubordinate       = DB::table('employees')->where('dm_code', $idLogin);

        $bulan  = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

        foreach ($bulan as $vbulan) :

        endforeach;


        return view('department.dashboard.index', [
            'title'             => 'Dashboard',
            //penting
            'employeeSession'   => $dEmployee->first(),
            'employee'          => $dEmployee->get(),
            'area'              => $area,
            'roleId'            => $roleId,

            'percent'           => json_encode($resultSum),
            'itemCompetent'     => $competent,
            'itemNeed'          => $need_improve,
            'subordinate'       => $qSubordinate->count(),
            'countLearning'     => $countLearning,
            'competentLearning' => $competenctLearning,
            'plannedLearning'   => $plannedLearning,
            'bulan'             => $bulan


        ]);
    }


}
