<?php

namespace App\Http\Controllers;

use App\Models\DashboardSection;
use App\Models\ProfileEmploy;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;

class DashboardSectionController extends Controller
{

    private $m_profile;
    private $m_dashboardSection;

    public function __construct()
    {
        $this->m_profile =  new \App\Models\ProfileEmploy();
        $this->m_dashboardSection =  new \App\Models\DashboardSection();
        $this->m_user =  new \App\Models\User();
    }

    public function index(Request $request)
    {

        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );


        $json_data = $this->dataCompetency($idLogin);
        $data = json_decode($json_data->content(), true);
        // dd($data);
        extract($data);
        return view('section.dashboard.index', [
            'title'         => 'Dashboard',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            // 'data'          => $competent,
            'competency'    => json_encode($getCompetency),
            'competent'     => json_encode($countCompetent),
            'need'          => json_encode($countNeed),
            // 'level1'        => $level1,
            'sumCompetent'  => $sumCompetent,
            'sumNeed'       => $sumNeed,
            'sumItem'       => $sumItem,
            'percent'       => json_encode($percent),
            // 'id'            => json_encode($id),
            'subordinateCount'  => $subCount,
            'subordinate'   => $subordinate,
        ]);
    }

    public function dataCompetency(){
        // $idLogin    = auth()->user()->employee_id;
        // $idLogin    = $request->session()->get('user');
        $idLogin    = '0773';
        // dd($idLogin);
        $subCount   = $this->m_dashboardSection->getSubordinate($idLogin)->count();

        $getCompetency  = array();
        $getCompetent   = array();
        $getNeed        = array();
        $countCompetent = array();
        $countNeed      = array();


        $competency = $this->m_profile->getCompetency($idLogin);

        foreach($competency as $vCompetency) :

            $getCompetency[]    = $vCompetency->competency_name;
            $getId[]            = $vCompetency->competency_id;
            $id                 = $vCompetency->competency_id;
        // dd($id);


            $subordinate    = $this->m_dashboardSection->getSubordinate($idLogin)->get();
            foreach($subordinate as $vSubordinate) :
                $subId      = $vSubordinate->employee_id;


                $competent = $this->m_dashboardSection->getItemAssessment($subId, $id);
                $getCompetent[]     = $competent->where('assessment_details.actual_result','=', 1)->count();

                $need = $this->m_dashboardSection->getItemAssessment($subId, $id);
                $getNeed[]          = $need->where('assessment_details.actual_result','=', 2)->count();

                $level = $this->m_dashboardSection->getItemAssessment($subId, $id);
                $getLevel1[]     = $level->where('assessment_details.actual_result','=', 1)
                                         ->where('performance_standards.level', '=', 1)
                                         ->count();


            endforeach;
            if(empty($getCompetent)){
                $getCompetent   = 0;
                $getNeed        = 0;
            }else{
                $getCompetentView   = array_sum($getCompetent);
                $getNeedView        = array_sum($getNeed);
                $getLevel1View      = array_sum($getCompetent);
            }
            $countCompetent[]   = $getCompetentView;
            $countNeed[]        = $getNeedView;

        endforeach;



        $percent = array_sum($countCompetent)/(array_sum($countCompetent) + array_sum($countNeed)) * 100;
        // $percent = 0;

        $data = [
            'getCompetency' => $getCompetency,
            'getCompetent' => $getCompetent,
            'getNeed' => $getNeed,
            // 'level1' => array_sum($countLevel1),
            'countCompetent' => $countCompetent,
            'countNeed' => $countNeed,
            'percent'=> $percent,
            // 'id'=>$id,
            'subCount' =>$subCount,
            'sumCompetent'=> array_sum($countCompetent),
            'sumNeed' => array_sum($countNeed),
            'sumItem' => array_sum($countCompetent) + array_sum($countNeed),
            // 'level1' => array_sum($getNeed)
            'subordinate' => $this->m_dashboardSection->getSubordinate($idLogin)->get()
        ];
        return response()->json($data);

    }
}
