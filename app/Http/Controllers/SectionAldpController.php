<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionAldpController extends Controller
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

        return view('section.aldp.index', [
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

        $qOther = DB::table('aldp_details')
            ->select('aldp_details.*', 'aldp_details.id as id_aldp_details')
            ->where('aldp_details.aldp_id', '=', $id);

        $learning   = DB::table('learnings')
            ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
            ->where('aldp_details.aldp_id', '=', $id);
        $learning2   = DB::table('learnings')
            ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
            ->where('aldp_details.aldp_id', '=', $id);
        $learning3   = DB::table('learnings')
            ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
            ->where('aldp_details.aldp_id', '=', $id);

        $functional_all     = $learning->where('aldp_details.competency_type', '=', '1')->count();
        $functional_comp    = $learning->where('aldp_details.competency_type', '=', '1')
            ->where('learnings.status', '=', 3)
            ->count();

        $cnl_all            = $learning2->where('aldp_details.competency_type', '=', '2')->count();
        $cnl_comp           = $learning2->where('aldp_details.competency_type', '=', '2')
            ->where('learnings.status', '=', 3)
            ->count();

        $other_all          = $learning3->where('aldp_details.competency_type', '=', '3')->count();
        $other_comp         = $learning3->where('aldp_details.competency_type', '=', '3')
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

        return view('section.aldp.detail', [
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

        return view('section.aldp.create', [
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
        return view('section.aldp.create', [
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

        return view('section.aldp.createother', [
            'title'             => 'Form Input Other Program or Mandatory Program',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'id_aldp'           => $id
        ]);
    }

    public function saveForm(Request $request)
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
        return redirect('/sectionAldpShow/' . $validation['aldp_id'])->with('success', 'New data has been addedd!');
    }

    public function saveFormOther(Request $request)
    {
        $validation = $request->validate([
            'aldp_id'           => 'required',
            'competency_type'   => 'required',
            'item_name'         => 'required',
            'planned_month'     => '',
            'planned_week'      => '',
            'remarks'           => '',
            'item_id'           => ''
        ]);

        $validation['status_detail'] = 0;

        DB::table('aldp_details')->insert($validation);
        return redirect('/sectionAldpShow/' . $validation['aldp_id'])->with('success', 'New data has been addedd!');
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
        return view('section.aldp.edit', [
            'title'             => 'Form Edit ALDP',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $data,
            'item'              => $item,
            'id_aldp'           => $data->aldp_id
        ]);
    }

    public function updateData(Request $request)
    {

        $validation = $request->validate([
            'item_id'           => 'required',
            'item_name'         => '',
            'planned_month'     => 'required',
            'planned_week'      => 'required',
            'remarks'           => ''
        ]);

        $learning = [
            'item_id'           => $request->input('item_id'),
            'item_name'         => $request->input('item_name'),
        ];


        $aldp_detail_id     = $request->input('aldp_detail_id');
        $aldp_id            = $request->input('aldp_id');


        DB::table('aldp_details')->where('id', $aldp_detail_id)->update($validation);
        DB::table('learnings')->where('aldp_detail_id', $aldp_detail_id)->update($learning);

        return redirect('/sectionAldpShow/' . $aldp_id)->with('success', 'Data has been updated!');
    }

    public function deleteItemAldp(Request $request)
    {
        $idAldp         = $request->input('idAldp');
        $idAldpDetail   = $request->input('idAldpDetail');


        DB::table('learnings')->where('aldp_detail_id', $idAldpDetail)->delete();
        DB::table('aldp_details')->where('id', $idAldpDetail)->delete();

        return redirect('/sectionAldpShow/' . $idAldp)->with('success', 'Data has been deleted!');
    }

    public function formParticipant(Request $request, $aldp_detail_id, $aldp_id, $item_id, $type_program)
    {
        // session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');

        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        if($type_program == 1){
            $itemEmployy = DB::table('assessment_details')
            ->join('assessments', 'assessment_details.assessment_id', '=', 'assessments.id')
            ->where('assessment_details.actual_result', 2)
            ->where('assessment_details.item_id', $item_id)
            ->select('assessments.employee_id')
            ->get();



            foreach ($itemEmployy as $vItemEmploy) {

                $rowItemEmployee[] = $vItemEmploy->employee_id;
            }

            if(!empty($rowItemEmployee)){

                $employee   = DB::table('employees')
                    ->whereIn('employee_id', $rowItemEmployee)
                    ->where('sm_code', '-')
                    ->where('dm_code', $idLogin)->get();
            }else{
                $employee   = DB::table('employees')
                ->where('sm_code', '-')
                    ->where('dm_code', $idLogin)->get();
            }

        }else{
            $employee   = DB::table('employees')
                ->where('sm_code', '-')
                ->where('dm_code', $idLogin)->get();
        }


        $data   = DB::table('learnings')
            ->join('employees', 'employees.employee_id', '=', 'learnings.employee_id')
            ->select('learnings.*', 'employees.employee_name', 'employees.position')
            ->where('learnings.aldp_detail_id', $aldp_detail_id);

        $item   = DB::table('aldp_details')->where('id', $aldp_detail_id)->get();
        foreach ($item as $vItem) :
            $item_id = $vItem->item_id;
            $item_name = $vItem->item_name;
        endforeach;

        return view('section.aldp.participant', [
            'title'             => 'Add Participant',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'id_aldp'           => $aldp_id,
            'id_aldp_details'   => $aldp_detail_id,
            'data'              => $data->paginate(10)->withQueryString(),
            'employee'          => $employee,
            'item_id'           => $item_id,
            'item_name'         => $item_name,
            'type_program'      => $type_program
        ]);
    }

    public function addParticipant(Request $request)
    {

        $validation = $request->validate([
            'competency_type'   => '',
            'aldp_detail_id'    => '',
            'employee_id'       => '',
            'item_id'           => '',
            'item_name'         => ''
        ]);

        $validation['status']   = 1;
        $aldp = $request->input('id_aldp');
        $aldp_detail = $request->input('aldp_detail_id');
        $item_id = $request->input('item_id');
        $type_program = $request->input('type_program');

        DB::table('learnings')->insert($validation);
        return redirect('/sectionAldpParticipant/' . $aldp_detail . '/' . $aldp . '/' . $item_id . '/'. $type_program)->with('success', 'New data has been addedd!');
    }

    public function deleteParticipat(Request $request)
    {
        $learning_id    = $request->input('id_learning');
        $aldp_id        = $request->input('id_aldp');
        $aldp_detail_id    = $request->input('aldp_detail_id');
        $item_id            = $request->input('item_id');
        $type_program    = $request->input('type_program');

        DB::table('learnings')->where('id', $learning_id)->delete();

        return redirect('/sectionAldpParticipant/' . $aldp_detail_id . '/' . $aldp_id . '/' . $item_id . '/'. $type_program)->with('success', 'Data has been Deleted!');
    }

    public function submitForm(Request $request)
    {

        $data = $request->input('id');

        DB::table('aldps')->where('id', $data)->update(['status' => 2]);
        return redirect('/sectionAldp')->with('success', 'Assessment has been updated!');
    }

    public function showDetailFinish(Request $request, $id)
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



        return view('section.aldp.verified.detailverify', [
            'title'             => 'ALDP Details Verify',
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

    public function showParticipantFinish(Request $request, $aldp_detail_id, $aldp_id, $item_id, $type_program)
    {
        // session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');

        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        if($type_program == 1){
            $itemEmployy = DB::table('assessment_details')
            ->join('assessments', 'assessment_details.assessment_id', '=', 'assessments.id')
            ->where('assessment_details.actual_result', 2)
            ->where('assessment_details.item_id', $item_id)
            ->select('assessments.employee_id')
            ->get();



            foreach ($itemEmployy as $vItemEmploy) {

                $rowItemEmployee[] = $vItemEmploy->employee_id;
            }

            if(!empty($rowItemEmployee)){

                $employee   = DB::table('employees')
                    ->whereIn('employee_id', $rowItemEmployee)
                    ->where('sm_code', '-')
                    ->where('dm_code', $idLogin)->get();
            }else{
                $employee   = DB::table('employees')
                ->where('sm_code', '-')
                    ->where('dm_code', $idLogin)->get();
            }

        }else{
            $employee   = DB::table('employees')
                ->where('sm_code', '-')
                ->where('dm_code', $idLogin)->get();
        }


        $data   = DB::table('learnings')
            ->join('employees', 'employees.employee_id', '=', 'learnings.employee_id')
            ->select('learnings.*', 'employees.employee_name', 'employees.position')
            ->where('learnings.aldp_detail_id', $aldp_detail_id);

        $item   = DB::table('aldp_details')->where('id', $aldp_detail_id)->get();
        foreach ($item as $vItem) :
            $item_id = $vItem->item_id;
            $item_name = $vItem->item_name;
        endforeach;

        return view('section.aldp.verified.participant', [
            'title'             => 'Add Participant',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'id_aldp'           => $aldp_id,
            'id_aldp_details'   => $aldp_detail_id,
            'data'              => $data->paginate(10)->withQueryString(),
            'employee'          => $employee,
            'item_id'           => $item_id,
            'item_name'         => $item_name,
            'type_program'      => $type_program
        ]);
    }

}
