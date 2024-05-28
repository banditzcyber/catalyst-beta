<?php

namespace App\Http\Controllers;

use App\Models\AssessmentEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssessmentEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // session (wajib);
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $data   = DB::table('assessments')
                    ->join('employees', 'assessments.employee_id', '=', 'employees.employee_id')
                    ->select('assessments.employee_id', 'employees.employee_name', 'employees.jobcode', 'employees.position', 'assessments.status', 'assessments.year', 'assessments.id')
                    ->where('assessments.employee_id', '=', $idLogin);

        return view('employee.assessment.index', [
            'title'     => 'Assessment',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'      => $data->get()
        ]);
    }


    public function show(Request $request, $id)
    {

        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $status     = DB::table('assessments')
                        ->where('id', $id)
                        ->select('status', 'id', 'jobcode')
                        ->get();

        $competency     = DB::table('profile_matrices')
                            ->join('competencies', 'profile_matrices.competency_id', '=', 'competencies.competency_id')
                            ->join('assessments', 'profile_matrices.jobcode', '=', 'assessments.jobcode')
                            ->select('profile_matrices.competency_id', 'profile_matrices.jobcode', 'competencies.competency_id', 'competencies.competency_name', 'competencies.description')
                            ->where('assessments.id', '=', $id);

        $valid          = DB::table('assessment_details')
                            ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                            ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                            ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                            ->where('assessment_details.assessment_id', '=', $id);

        return view('employee.assessment.detail', [
            'title'     => 'Assessment Detail',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'status'    => $status,
            'data'      => $competency->get(),
            'valid'     => $valid,
            'id'     => $id
        ]);
    }


    public function form(Request $request, $id, $assessment_id, $jobcode)
    {
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $level  = DB::table('profile_matrices')->where('competency_id', $id)->where('jobcode', $jobcode)->get();
        foreach($level as $vLevel) :
            $dLevel = $vLevel->level;
        endforeach;

        $data   = DB::table('items')
                    ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                    ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                    ->where('competencies.competency_id', '=', $id);


        if($dLevel == 1) {
            $data->where('performance_standards.level', '=', 1);
        }elseif($dLevel == 2){
            $data->where(function ($query) {
                $query->where('performance_standards.level', 1)
                      ->orWhere('performance_standards.level', 2);
            });
        }elseif($dLevel == 3) {
            $data->where(function ($query) {
                $query->where('performance_standards.level', 1)
                      ->orWhere('performance_standards.level', 2)
                      ->orWhere('performance_standards.level', 3);
            });
        }else{
            $data->where(function ($query) {
                $query->where('performance_standards.level', 1)
                      ->orWhere('performance_standards.level', 2)
                      ->orWhere('performance_standards.level', 3)
                      ->orWhere('performance_standards.level', 4);
            });
        }

        $competency             = DB::table('competencies')->where('competency_id', $id)->select('competency_name')->get();
        foreach($competency as $vCompetency) :
            $competency_name    = $vCompetency->competency_name;
        endforeach;

        return view('employee.assessment.form', [
            'title'             => 'Form Assessment',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $data->get(),
            'assessment_id'     => $assessment_id,
            'competency_name'   => $competency_name
        ]);
    }

    public function saveFormAssessment(Request $request)
    {
        $item_id  = $request->input('item_id');
        $assessment_id  = $request->input('assessment_id');
        $assessment_result  = $request->input('assessment_result');
        $actual_result  = $request->input('assessment_result');
        $comment  = $request->input('comment');
        $assessment_update = $request->input('kd_assessment_update');

        $data   = array();
        $index  = 0;

        foreach ($item_id as $dataItemId) {
            array_push($data, array(
                'item_id'           => $dataItemId,
                'assessment_id'     => $assessment_id[$index],
                'assessment_result' => $assessment_result[$index],
                'actual_result'     => $actual_result[$index],
                'comment'           => $comment[$index]
            ));
            $index++;
        }
        DB::table('assessment_details')->insert($data);
        // return redirect()->back()->with('success','Data has been added!');
        return redirect('/assessmentEmployee/'.$assessment_update)->with('success', 'Assessment has been added!');
    }

    public function resultAssessment(Request $request, $id, $assessment_id, $jobcode)
    {
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $data = DB::table('assessment_details')
                    ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                    ->join('assessments', 'assessment_details.assessment_id', '=', 'assessments.id')
                    ->join('performance_standards', 'performance_standards.ps_id', '=', 'items.ps_id')
                    ->join('competencies', 'competencies.competency_id', '=', 'performance_standards.competency_id')
                    ->select('items.item_id', 'items.item_name', 'items.intervention', 'items.type_training', 'assessment_details.assessment_result')
                    ->where('assessments.id', '=', $assessment_id)
                    ->where('competencies.competency_id', $id);

        $competency     = DB::table('competencies')
                            ->where('competency_id', $id)
                            ->get();

        return view('employee.assessment.view', [
            'title'             => 'Result Assessment',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $data->get(),
            'competency'        => $competency,
            'assessment_id'     => $assessment_id
        ]);
    }

    public function finishForm(Request $request)
    {

        $data = $request->input('id');

        DB::table('assessments')->where('id', $data)->update(['status' => 2]);
        return redirect('/assessmentEmployee')->with('success', 'Assessment has been updated!');
    }

    public function reviewAssessment(Request $request, $competency_id, $assessment_id, $jobcode)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $id = $assessment_id;
        // dd($id);

        $data       = DB::table('assessment_details')
                        ->join('assessments', 'assessment_details.assessment_id', '=', 'assessments.id')
                        ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                        ->join('performance_standards', 'performance_standards.ps_id', '=', 'items.ps_id')
                        ->join('competencies', 'competencies.competency_id', '=', 'performance_standards.competency_id')
                        ->select('assessment_details.*', 'assessments.id as assessment_id', 'items.item_name', 'items.intervention','performance_standards.ps_name', 'performance_standards.level')
                        ->where('assessment_details.assessment_id', '=', $id)
                        ->where('competencies.competency_id', $competency_id);

        return view('section.validations.form', [
            'title'             => 'Form Edit',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $data->get(),
            'assessment_id'     => $id
        ]);
    }
}
