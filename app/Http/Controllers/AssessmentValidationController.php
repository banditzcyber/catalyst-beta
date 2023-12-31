<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Competency;
use App\Http\Requests\StoreCompetencyRequest;
// use App\Http\Requests\UpdateCompetencyRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AssessmentValidationController extends Controller
{
    public function index()
    {
        $idLogin    = auth()->user()->employee_id;
        
        $search = DB::table('assessments')
                    ->join('employees', 'assessments.employee_id', '=', 'employees.employee_id')
                    ->select('assessments.*', 'employees.employee_name', 'employees.position')
                    ->where('employees.sm_code', $idLogin);

        if(request('search')) {
            $search->where('assessments.employee_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_name', 'like', '%' . request('search') . '%')
                   ->orWhere('assessments.year', 'like', '%' . request('search') . '%');
        }

        return view('section.validations.index', [
            'title'     => 'Assessment Validation',
            'data'      => $search->paginate(10)->withQueryString(),
            'countData' => $search->count('assessments.id')
        ]);
    }

    public function show($id)
    {
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

        return view('section.validations.detail', [
            'title'     => 'Assessment Detail',
            'status'    => $status,
            'data'      => $competency->get(),
            'valid'     => $valid,
            'id'     => $id
        ]);
    }

    public function finishFormValidation(Request $request)
    {
        $assessment_id = $request->input('assessment_id');
        $data['status']     = 3;
        DB::table('assessments')->where('id', $assessment_id)->update($data);
        return redirect('/assessmentValidation')->with('success', 'Assessment has been updated!');
    }

    public function reviewAssessment($competency_id, $assessment_id, $jobcode)
    {
        $id = $assessment_id;
        // dd($id);

        $data       = DB::table('assessment_details')
                        ->join('assessments', 'assessment_details.assessment_id', '=', 'assessments.id')
                        ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                        ->join('performance_standards', 'performance_standards.ps_id', '=', 'items.ps_id')
                        ->select('assessment_details.*', 'assessments.id as assessment_id', 'items.item_name', 'items.intervention','performance_standards.ps_name', 'performance_standards.level')
                        ->where('assessment_details.assessment_id', '=', $id);

        return view('section.validations.form', [
            'title'     => 'Form Edit',
            'data'       => $data->get(),
            'assessment_id' => $id
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

        $kd_assessment_detail = $request->input('kd_assessment_detail');

        // dd($kd_assessment_detail);

        // $data   = array();
        // $index  = 0;

        // foreach ($kd_assessment_detail as $index =>$dataItem) {
        //     array_push($data, array(
        //         'assessment_result' => $assessment_result[$index],
        //         'actual_result'     => $actual_result[$index],
        //         'comment'           => $comment[$index]
        //     ));
        //     $index++;
        // }
        
        // dd ($data[]);
        // DB::table('assessment_details')->where('id', $kd_assessment_detail)->update($data);

        // $value = array('1' => 'Hello', '2' => 'World');
        // $ranking = array();
        // foreach ($value as $k => $v){
        //     array_push($ranking, $v);
        // }
        // dd($value[$k]);

        // $index = 'id';

        // Batch::update($userInstance, $value, $index);

        foreach($request->kd_assessment_detail as $kode => $id){
            $data['id']                     = $request->kd_assessment_detail[$kode];
            $data['assessment_result']      = $request->assessment_result[$kode];
            $data['actual_result']          = $request->assessment_result[$kode];
            $data['comment']                = $request->comment[$kode];

            // dd($request->kd_assessment_detail[$kode], $data);
           
        }
        
        DB::table('assessment_details')->where('id', $request->kd_assessment_detail[$kode])->update($data);
        // dd($data);





        // foreach ($request->kd_assessment_detail as $key => $value) {
        //     $data = array(                 
        //         'assessment_result'     => $request->assessment_result[$key],
        //         'actual_result'         => $request->assessment_result[$key],                   
        //         'comment'               => $request->comment[$key],                   
        //     );         

        //     dd($request->kd_assessment_detail[$key], $data);
        //     // DB::table('assessment_details')->where('id',$kd_assessment_detail[$key])->update($data); 
        // }


        // dd($data);

        // DB::table('assessment_details')->wherein($data);
        // return redirect()->back()->with('success','Data has been added!');
        // return redirect('/assessmentValidation/show/'.$assessment_id)->with('success', 'Assessment has been added!');
    }
}
