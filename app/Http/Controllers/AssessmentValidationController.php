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

        return view('section.validation.detail', [
            'title'     => 'Assessment Detail',
            'status'    => $status,
            'data'      => $competency->get(),
            'valid'     => $valid,
            'id'     => $id
        ]);
    }
}
