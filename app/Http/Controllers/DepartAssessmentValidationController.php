<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartAssessmentValidationController extends Controller
{
    public function index(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $data   = DB::table('assessments as a')
                    ->join('employees as e', 'a.employee_id', '=', 'e.employee_id')
                    ->select('a.*', 'e.employee_name', 'e.position')
                    ->where('e.dm_code', $idLogin)->where('e.sm_code', '-');
        // dd($data->get());

        return view('department.validation.index', [
            'title'             => 'Assessment Validation',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $data->get(),
            'countData'         => $data->count('a.id')
        ]);
    }

    public function show(Request $request, $id)
    {

        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $status     = DB::table('assessments as a')
                            ->join('employees as e', 'e.employee_id', '=', 'a.employee_id')
                            ->where('a.id', $id)
                            ->select('a.status', 'a.id', 'a.jobcode', 'e.employee_name', 'a.employee_id')
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

        // dd($dEmployee->first());



        foreach ($status as $vStatus) :
            $dStatus        = $vStatus->status;
            $dJobcode       = $vStatus->jobcode;
            $dEmployeeName  = $vStatus->employee_name;
            $dEmployee_id   = $vStatus->employee_id;
            $kd_assessment  = $vStatus->id;
        endforeach;


        return view('department.validation.detail', [
            'title'             => 'Assessment Detail',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            // 'status'            => $status->get(),s
            'data'              => $competency->get(),
            'valid'             => $valid,
            'id'                => $id,
            'status'            => $dStatus,
            'jobcode'           => $dJobcode,
            'employee_name'     => $dEmployeeName,
            'employee_id'       => $dEmployee_id,
            'kd_assessment'     => $kd_assessment
        ]);
    }

    public function finishFormValidation(Request $request)
    {
        $assessment_id = $request->input('assessment_id');
        $data['status']     = 3;
        $data['status_launch'] = 1;
        $data['updated_at'] = now();
        DB::table('assessments')->where('id', $assessment_id)->update($data);
        return redirect('/assessmentValidationDepartment')->with('success', 'Assessment has been updated!');
    }

    public function returnForm(Request $request)
    {
        $assessment_id = $request->input('assessment_id');
        $data['status']     = 1;
        $data['updated_at'] = now();
        DB::table('assessments')->where('id', $assessment_id)->update($data);
        return redirect('/assessmentValidationDepartment')->with('success', 'Assessment has been returned!');
    }
}
