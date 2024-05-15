<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralAssessmentController extends Controller
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
                    ->where('e.dm_code', '-')->where('e.sm_code', '-')->where('e.gm_code', $idLogin);
        // dd($data->get());

        return view('general.validation.index', [
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

        $status     = DB::table('assessments')
                        ->where('id', $id)
                        ->select('status', 'id', 'jobcode');

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


        return view('general.validation.detail', [
            'title'             => 'Assessment Detail',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'status'            => $status->get(),
            'data'              => $competency->get(),
            'valid'             => $valid,
            'id'                => $id,
            // 'person'            => $person,
            // 'superior'          => $superior,
            // 'completed'         => $completed
        ]);
    }

    public function finishFormValidation(Request $request)
    {
        $assessment_id = $request->input('assessment_id');
        $data['status']     = 3;
        $data['updated_at'] = now();
        DB::table('assessments')->where('id', $assessment_id)->update($data);
        return redirect('/generalAssessment')->with('success', 'Assessment has been updated!');
    }
}
