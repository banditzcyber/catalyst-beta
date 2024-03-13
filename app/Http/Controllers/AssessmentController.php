<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\AssessmentDetail;
use App\Http\Requests\StoreAssessmentRequest;
// use App\Http\Requests\UpdateAssessmentRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AssessmentDetailImport;

class AssessmentController extends Controller
{

    public function index(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $search = DB::table('assessments')
                    ->join('employees', 'assessments.employee_id', '=', 'employees.employee_id')
                    ->select('assessments.*', 'employees.employee_name', 'employees.position')
                    ->orderby('id', 'desc');

        if(request('search')) {
            $search->where('assessments.employee_id', 'like', '%' . request('search') . '%')
                   ->orWhere('assessments.jobcode', 'like', '%' . request('search') . '%')
                   ->orWhere('assessments.year', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_name', 'like', '%' . request('search') . '%');
        }

        return view('admin.assessment.index', [
            'title'     => 'Assessment',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'      => $search->paginate(10)->withQueryString(),
            'countData' => $search->count()
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

        $employee = DB::table('employees')->get();
        return view('admin.assessment.create', [
            'title'     => 'Add Assessment',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'employee'  => $employee
        ]);
    }

    public function store(StoreAssessmentRequest $request)
    {
        $validation = $request->validate([
            'employee_id'   => 'required',
            'jobcode'       => 'required',
            'year'          => 'required',
            'status'        => 'required',
            'status_launch' => 'required'
        ]);

        // $validation['status']  = 1;
        // $validation['status_launch']  = 2;

        DB::table('assessments')->insert($validation);

        return redirect('/assessmentAdmin')->with('success', 'Data has been added!');
    }


    public function show(Request $request, $id)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $employee   = DB::table('assessments')
                        ->join('employees', 'employees.employee_id', '=', 'assessments.employee_id')
                        ->select('employees.employee_name', 'employees.position')
                        ->where('assessments.id', '=', $id)
                        ->get();

        $search = DB::table('assessment_details')
                    ->join('assessments', 'assessment_details.assessment_id', '=', 'assessments.id')
                    ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                    ->where('assessment_details.assessment_id', '=', $id)
                    ->select('assessment_details.id',
                             'items.item_id',
                             'items.item_name',
                             'items.intervention',
                             'items.type_training',
                             'assessment_details.assessment_result',
                             'assessment_details.actual_result',
                             'assessment_details.comment');

        if(request('search')) {
            $search->where('items.item_id', 'like', '%' . request('search') . '%')
                   ->orWhere('items.intervention', 'like', '%' . request('search') . '%')
                   ->orWhere('assessment_details.assessment_result', 'like', '%' . request('search') . '%')
                   ->orWhere('assessment_details.actual_result', 'like', '%' . request('search') . '%')
                   ->orWhere('year', 'like', '%' . request('search') . '%');
        }

        return view('admin.assessment.detail', [
            'title'     => 'Assessment Details',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'      => $search->paginate(10)->withQueryString(),
            'employee'  => $employee,
            'id'        => $id,
            'countData' =>$search->count()
        ]);
    }


    public function editData(Request $request, $id)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $data  = DB::table('assessments')
                ->join('employees', 'assessments.employee_id', '=', 'employees.employee_id')
                ->select('assessments.*', 'employees.employee_name', 'employees.position')
                ->where('assessments.id', $id)->first();

        $employee = DB::table('employees')->get();

        return view('admin.assessment.edit', [
            'title'     => 'Add Assessment',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'employee'  => $employee,
            'assessment'  => $data
        ]);
    }


    public function updateData(Request $request)
    {
        $validation = $request->validate([
            'employee_id'   => 'required',
            'jobcode'       => 'required',
            'year'          => 'required',
            'status'        => 'required',
            'status_launch' => 'required'
        ]);

        $id     = $request->input('assessment_id');
        DB::table('assessments')->where('id', $id)->update($validation);
        return redirect('/assessmentAdmin')->with('success', 'Data has been updated!');
    }


    public function destroy($id)
    {
        DB::table('assessments')->where('id', $id)->delete();
        return redirect('/assessmentAdmin')->with('success', 'Data has been deleted!');
    }

    public function importData(Request $request){

        // $assessment_id = $request->input('assessment_id');
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv', // Add any validation rules you need
            'assessment_id' => 'required'
        ]);

        if ($request->hasFile('file')) {

            $path = $request->file('file')->getRealPath();
            $import = new AssessmentDetailImport();
            Excel::import($import, $path);
            // You can also add success or error handling here
            return redirect('/assessmentAdmin')->with('success', 'Imprort data has been succesed!');
        }

        return redirect('/assessmentAdmin')->with('warning', 'Imprort data failed!');
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

        return view('admin.assessment.profile', [
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
