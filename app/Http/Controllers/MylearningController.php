<?php

namespace App\Http\Controllers;

use App\Models\Mylearning;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MylearningController extends Controller
{
    public function __construct()
    {
        $this->mMyLearning =  new \App\Models\Mylearning();
    }

    public function index(Request $request)
    {
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $data = $this->mMyLearning->getData($idLogin);

        return view('employee.mylearning.index', [
            'title'         => 'My Learning',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'          => $data->get()
        ]);
    }


    public function store(Request $request)
    {
        $leaning_id = $request->input('learning_id');
        // dd($validation);
        // return $request->file('evidence')->store('data-evidence');

        $validation = $request->validate([
            'started_at'    => 'required',
            'finished_at'   => 'required',
            'evidence'      => 'required|file|max:1024',
            'comment'       => ''
        ]);

        $validation['status'] = 2;
        $validation['evidence'] = $request->file('evidence')->store('data-evidence');

        DB::table('learnings')->where('id', $leaning_id)->update($validation);
        return redirect('/mylearning')->with('success', 'New data has been addedd!');
    }


    public function show(Request $request, $id)
    {
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $data   = DB::table('learnings')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                    ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                    ->where('learnings.id', $id)
                    ->get();

        $query  = DB::table('learnings')
                    ->get();

            return view('employee.mylearning.detail', [
                'title'     => 'Detail Learning',
                'employeeSession'   => $dEmployee->first(),
                'area'              => $area,
                'roleId'            => $roleId,
                'data'      => $query,
                'data2'     => $data
            ]);
    }



    public function form(Request $request, $id)
    {

        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $data   = DB::table('learnings')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                    ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                    ->where('learnings.id', $id)
                    ->get();

        $query  = DB::table('learnings')
                    ->get();

            return view('employee.mylearning.form', [
                'title'     => 'Form Close Gap',
                'employeeSession'   => $dEmployee->first(),
                'area'              => $area,
                'roleId'            => $roleId,
                'data'      => $query,
                'data2'     => $data,
                'learning_id'   => $id
            ]);
    }
}
