<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartAldpController extends Controller
{
    public function index(Request $request)
    {
        // session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        $query      = DB::table('aldps')
            ->where('manager_id', '=', $idLogin);

        return view('department.aldp.index', [
            'title'             => 'Annual Learning Development Plan',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $query->get()
        ]);
    }

    public function show(Request $request, $id)
    {
        // session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        $title  = DB::table('aldps')
            ->join('employees', 'aldps.manager_id', '=', 'employees.employee_id')
            ->where('aldp_id', '=', $id);

        $basequery = DB::table('aldp_details')
            ->join('items', 'items.item_id', '=', 'aldp_details.item_id')
            ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
            ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
            ->select('aldp_details.*', 'items.item_id', 'items.intervention', 'items.type_training', 'performance_standards.ps_name', 'performance_standards.level', 'competencies.competency_name', 'aldp_details.id as id_aldp_details')
            ->where('aldp_details.aldp_id', '=', $id);

        $cnlquery  = DB::table('aldp_details')
            ->select('aldp_details.*', 'items.*', 'aldp_details.id as id_aldp_details')
            ->join('items', 'aldp_details.item_id', '=', 'items.item_id')
            ->where('aldp_details.aldp_id', '=', $id);

        $learning   = DB::table('learnings')
            ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
            ->where('aldp_details.aldp_id', '=', $id);

        $qOther = DB::table('aldp_details')
            ->select('aldp_details.*', 'aldp_details.id as id_aldp_details')
            ->where('aldp_details.aldp_id', '=', $id);

        $functional_all     = $learning->where('aldp_details.competency_type', '=', '1')->count();
        $functional_comp    = $learning->where('aldp_details.competency_type', '=', '1')
            ->where('learnings.status', '=', 3)
            ->count();

        $other_all          = $learning->where('aldp_details.competency_type', '=', '3')->count();
        $other_comp         = $learning->where('aldp_details.competency_type', '=', '3')
            ->where('learnings.status', '=', 3)
            ->count();

        $cnl_all            = $learning->where('aldp_details.competency_type', '=', '2')->count();
        $cnl_comp           = $learning->where('aldp_details.competency_type', '=', '2')
            ->where('learnings.status', '=', 3)
            ->count();

        if (!empty($functional_all)) {
            $functional_percent = ($functional_comp / $functional_all) * 100;
        } else {
            $functional_percent = 0;
        }


        if (!empty($cnl_all)) {
            $cnl_percent = ($cnl_comp / $cnl_all) * 100;
        } else {
            $cnl_percent = 0;
        }



        if (!empty($other_all)) {
            $other_percent = ($other_comp / $other_all) * 100;
        } else {
            $other_percent = 0;
        }

        return view('department.aldp.detail', [
            'title'             => 'ALDP Details',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'title2'            => $title->get(),
            'functional'        => $basequery->where('aldp_details.competency_type', '=', '1')->get(),
            'functional_all'    => $functional_all,
            'functional_comp'   => $functional_comp,
            'functional_percent' => $functional_percent,
            'cnl'               => $cnlquery->where('aldp_details.competency_type', '=', '2')->get(),
            'cnl_all'           => $cnl_all,
            'cnl_comp'          => $cnl_comp,
            'cnl_percent'       => $cnl_percent,
            'other'             => $qOther->where('aldp_details.competency_type', '=', '3')->get(),
            'other_all'         => $other_all,
            'other_comp'        => $other_comp,
            'other_percent'     => $other_percent,
            'id_aldp'           => $id,
            'assessment_data'   => DB::table('assessments')->where('assessment_id', $id)->get()
        ]);
    }

    public function formFunctional(Request $request, $id)
    {

        // session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin);

        $assessments = []; // Array to store all assessments

        $dSubordinate = DB::table('employees')
            ->where('sm_code', '-')
            ->where('dm_code', $idLogin)
            ->get();

        foreach ($dSubordinate as $vSubordinate) {

            // Append the assessment to the assessments array
            $assessments[] = $vSubordinate->employee_id;
        }


        $data   = DB::table('assessment_details AS ad')
                        ->join('assessments AS a', 'a.id', '=', 'ad.assessment_id')
                        ->join('items AS i', 'i.item_id', '=', 'ad.item_id')
                        ->join('performance_standards As ps', 'ps.ps_id', '=', 'i.ps_id')
                        ->join('competencies As c', 'c.competency_id', '=', 'ps.competency_id')
                        ->select('ad.item_id', 'i.item_name', 'i.intervention', 'i.type_training', 'ps.level', 'ps.ps_name', 'c.competency_name')
                        ->where('ad.actual_result', 2)
                        ->whereIn('a.employee_id', $assessments)
                        ->distinct('ad.item_id')
                        ->get();

        return view('department.aldp.create', [
            'title'             => 'Form Input ALDP (Functional)',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'id_aldp'           => $id,
            'data'              => $data,
            'comp_type'         => 1
        ]);
    }

    public function formLeadership(Request $request, $id)
    {
        // session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        $data  = DB::table('items')
            ->join('performance_standards', 'performance_standards.ps_id', '=', 'items.ps_id')
            ->join('competencies', 'competencies.competency_id', '=', 'performance_standards.competency_id')
            ->where('competencies.competency_type', '=', 'leadership')
            ->get();
        return view('department.aldp.create', [
            'title'             => 'Form Input Leadership Competency',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'id_aldp'           => $id,
            'data'              => $data,
            'comp_type'         => 2
        ]);
    }

    public function formOther(Request $request, $id)
    {
        // session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        return view('department.aldp.createother', [
            'title'             => 'Form Input Other Program or Mandatory Program',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'id_aldp'           => $id
        ]);
    }

    public function store(Request $request)
    {

        $validation     = $request->validate([
            'aldp_id'           => 'required',
            'competency_type'   => 'required',
            'item_id'           => 'required',
            'item_name'         => '',
            'planned_month'     => 'required',
            'planned_week'      => 'required',
            'remarks'           => ''
        ]);

        $validation['status_detail'] = 0;
        // dd($validation);

        DB::table('aldp_details')->insert($validation);
        return redirect('/departAldpShow/' . $validation['aldp_id'])->with('success', 'New data has been addedd!');
    }

    public function editData(Request $request, $id)
    {

        // session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        $data   = DB::table("aldp_details")
            ->join('items', 'items.item_id', '=', 'aldp_details.item_id')
            ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
            ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
            ->select('aldp_details.*', 'items.item_id', 'items.intervention', 'items.type_training', 'performance_standards.ps_name', 'performance_standards.level', 'competencies.competency_name')
            ->where('aldp_details.id', $id)->first();

        $item = DB::table('assessment_details')
            ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
            ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
            ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
            ->select('assessment_result', 'items.item_name', 'items.item_id', 'items.intervention', 'items.type_training', 'performance_standards.ps_name', 'performance_standards.level', 'competencies.competency_name')
            ->orderby('performance_standards.level', 'asc')
            ->where('assessment_result', 2)
            ->get();

        // dd($id);
        return view('department.aldp.edit', [
            'title'             => 'Form Edit ALDP (Functional)',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $data,
            'item'              => $item,
            'id_aldp'           => $data->aldp_id
        ]);
    }
}
