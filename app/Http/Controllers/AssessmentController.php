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

    public function index()
    {
        $search = DB::table('assessments')
                    ->join('employees', 'assessments.employee_id', '=', 'employees.employee_id')
                    ->select('assessments.*', 'employees.employee_name', 'employees.position');

        if(request('search')) {
            $search->where('assessments.employee_id', 'like', '%' . request('search') . '%')
                   ->orWhere('assessments.jobcode', 'like', '%' . request('search') . '%')
                   ->orWhere('assessments.year', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_name', 'like', '%' . request('search') . '%');
        }

        return view('admin.assessment.index', [
            'title'     => 'Assessment',
            'data'      => $search->paginate(10)->withQueryString(),
            'countData' => $search->count()
        ]);
    }


    public function create()
    {
        $employee = DB::table('employees')->get();
        return view('admin.assessment.create', [
            'title'     => 'Add Assessment',
            'employee'  => $employee
        ]);
    }

    public function store(StoreAssessmentRequest $request)
    {
        $validation = $request->validate([
            'employee_id'   => 'required',
            'jobcode'       => 'required',
            'year'          => 'required'
        ]);

        $validation['status']  = 1;
        $validation['status_launch']  = 2;

        DB::table('assessments')->insert($validation);

        return redirect('/assessmentAdmin')->with('success', 'Data has been added!');
    }


    public function show($id)
    {
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
            'data'      => $search->paginate(10)->withQueryString(),
            'employee'  => $employee,
            'id'        => $id,
            'countData' =>$search->count()
        ]);
    }


    public function editData($id)
    {
        $data  = DB::table('assessments')
                ->join('employees', 'assessments.employee_id', '=', 'employees.employee_id')
                ->select('assessments.*', 'employees.employee_name', 'employees.position')
                ->where('assessments.id', $id)->first();

        $employee = DB::table('employees')->get();

        return view('admin.assessment.edit', [
            'title'     => 'Add Assessment',
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


}
