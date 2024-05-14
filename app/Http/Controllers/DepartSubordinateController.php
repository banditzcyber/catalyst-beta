<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartSubordinateController extends Controller
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

        $query  = DB::table('employees')
                    ->where('dm_code', $idLogin)
                    ->paginate(12)->withQueryString();

        return view('department.subordinate.index', [
            'title'             => 'Subordinate',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $query,
            'id_login'          => $idLogin
        ]);
    }

    public function profile(Request $request, $employee_id)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $dEmployeeSub  = DB::table('employees')
                      ->where('employees.employee_id', '=', $employee_id );

        $getCompetency  = array();
        $getCompetent   = array();
        $getNeed        = array();

        $m_query =  new \App\Models\ProfileEmploy();
        $competency = $m_query->getCompetency($employee_id);
        foreach($competency as $vCompetency) :

            $getCompetency[]    = $vCompetency->competency_name;
            $getId[]            = $vCompetency->competency_id;
            $id                 = $vCompetency->competency_id;

            $competent  = $m_query->getItemAssessment($employee_id, $id);

            $getCompetent[]     = $competent->where('assessment_details.assessment_result','=', 1)->count();

            $neet               = $m_query->getItemAssessment($employee_id, $id);
            $getNeed[]          = $neet->where('assessment_details.assessment_result','=', 2)->count();


            $getLevel1[]        = $m_query->getItemAssessment($employee_id, $id)
                                        ->where('assessment_details.assessment_result','=', 1)
                                        ->where('performance_standards.level', '1')
                                        ->count();
            $getLevel2[]        = $m_query->getItemAssessment($employee_id, $id)
                                        ->where('assessment_details.assessment_result','=', 1)
                                        ->where('performance_standards.level', '2')
                                        ->count();
            $getLevel3[]        = $m_query->getItemAssessment($employee_id, $id)
                                        ->where('assessment_details.assessment_result','=', 1)
                                        ->where('performance_standards.level', '3')
                                        ->count();
            $getLevel4[]        = $m_query->getItemAssessment($employee_id, $id)
                                        ->where('assessment_details.assessment_result','=', 1)
                                        ->where('performance_standards.level', '4')
                                        ->count();

            $getAllLevel1[]     = $m_query->getItemAssessment($employee_id, $id)
                                        ->where('assessment_details.assessment_result','!=', 3)
                                        ->where('performance_standards.level', '1')
                                        ->count();
            $getAllLevel2[]     = $m_query->getItemAssessment($employee_id, $id)
                                        ->where('assessment_details.assessment_result','!=', 3)
                                        ->where('performance_standards.level', '2')
                                        ->count();
            $getAllLevel3[]     = $m_query->getItemAssessment($employee_id, $id)
                                        ->where('assessment_details.assessment_result','!=', 3)
                                        ->where('performance_standards.level', '3')
                                        ->count();
            $getAllLevel4[]     = $m_query->getItemAssessment($employee_id, $id)
                                        ->where('assessment_details.assessment_result','!=', 3)
                                        ->where('performance_standards.level', '4')
                                        ->count();
        endforeach;

        if(array_sum($getCompetent) == 0) {
            $percent = 0;
            $percentLevel1 = 0;
            $percentLevel2 = 0;
            $percentLevel3 = 0;
            $percentLevel4 = 0;
        }else{

            $percent = array_sum($getCompetent)/(array_sum($getCompetent) + array_sum($getNeed)) * 100;
            $percentLevel1 = array_sum($getLevel1)/array_sum($getAllLevel1) * 100;
            $percentLevel2 = array_sum($getLevel2)/array_sum($getAllLevel2) * 100;

            if(array_sum($getLevel3) == 0) {
                $percentLevel3 = 0;
            }else{
                $percentLevel3 = array_sum($getLevel3)/array_sum($getAllLevel3) * 100;
            }

            if(array_sum($getLevel4) == 0) {
                $percentLevel4 = 0;
            }else{
                $percentLevel4 = array_sum($getLevel4)/array_sum($getAllLevel4) * 100;
            }
        }



        $dataList = DB::table('assessment_details')
                        ->join('assessments', 'assessment_details.assessment_id', '=', 'assessments.assessment_id')
                        ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                        ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                        ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                        ->where('assessments.employee_id', '=', $employee_id);

        return view('department.subordinate.profile', [
            'title'         => 'Dashboard',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'subTitle'      => 'Actual Data',
            'btnList'      => 'btn-outline-dark',
            'btnCurrent'   => 'btn-outline-warning',
            'btnActual'    => 'btn-primary',
            // 'data'          => $competent->where('assessment_details.actual_result','=', 1)->count(),
            'employee'      => $dEmployeeSub->get(),
            'competency'    => json_encode($getCompetency),
            'competent'     => json_encode($getCompetent),
            'need'          => json_encode($getNeed),
            'sumCompetent'  => array_sum($getCompetent),
            'sumNeed'  => array_sum($getNeed),
            'percent'  => json_encode($percent),
            // 'id' => json_encode($id),
            'listItem'  => $dataList->where('assessment_details.actual_result','=', 2)->get(),
            'level1'    => array_sum($getLevel1),
            'level2'    => array_sum($getLevel2),
            'level3'    => array_sum($getLevel3),
            'level4'    => array_sum($getLevel4),
            'Alllevel1'    => array_sum($getAllLevel1),
            'Alllevel2'    => array_sum($getAllLevel2),
            'Alllevel3'    => array_sum($getAllLevel3),
            'Alllevel4'    => array_sum($getAllLevel4),
            'percentLevel1' => $percentLevel1,
            'percentLevel2' => $percentLevel2,
            'percentLevel3' => $percentLevel3,
            'percentLevel4' => $percentLevel4,
        ]);
    }
}
