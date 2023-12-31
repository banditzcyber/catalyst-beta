<?php

namespace App\Http\Controllers;

use App\Models\AldpSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AldpSectionController extends Controller
{

    public function index()
    {
        $idLogin    = auth()->user()->employee_id;

        $query      = DB::table('aldps')
                        ->where('manager_id', '=', $idLogin);

        return view('section.aldp.index', [
            'title'         => 'Annual Learning Development Plan',
            'data'          => $query->get()
        ]);
    }


    public function formFunctional($id)
    {
        $data = DB::table('assessment_details')
                ->join('items', 'assessment_details.item_id', '=', 'items.item_id')
                ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                ->select('assessment_result', 'items.item_name', 'items.item_id', 'items.intervention', 'items.type_training', 'performance_standards.ps_name', 'performance_standards.level', 'competencies.competency_name')
                ->orderby('performance_standards.level', 'asc')
                ->where('assessment_result', 2)
                ->get();
        // dd($data);
        return view('section.aldp.create', [
            'title'     => 'Form Input ALDP (Functional)',
            'id_aldp'   => $id,
            'data'      => $data
        ]);
    }

    public function create($id)
    {

        return view('section.aldp.create', [
            'title'     => 'Add Data',
            'id_aldp'   => $id
        ]);
    }


    public function store(Request $request)
    {


        $validation     = $request->validate([
            'aldp_id'           => 'required',
            'competency_type'   => 'required',
            'item_id'           => 'required',
            'item_name'         => '',
            'planned_month'     => '',
            'planned_week'      => '',
            'remarks'           => ''
        ]);

        $validation['status_detail'] = 0;
        // dd($validation);

        DB::table('aldp_details')->insert($validation);
        return redirect('/aldpSection/'. $validation['aldp_id'])->with('success', 'New data has been addedd!');
    }


    public function show($id)
    {
        $title  = DB::table('aldps')
                    ->join('employees', 'aldps.manager_id', '=', 'employees.employee_id')
                    ->where('aldp_id', '=', $id);

        $basequery = DB::table('aldp_details')
                    ->select('aldp_details.*', 'items.*', 'aldp_details.id as id_aldp_details')
                    ->leftjoin('items','aldp_details.item_id', '=', 'items.item_id')
                    ->where('aldp_details.aldp_id', '=', $id);

        $learning   = DB::table('learnings')
                    ->join('aldp_details', 'learnings.aldp_detail_id','=', 'aldp_details.id')
                    ->where('aldp_details.aldp_id', '=', $id);

        $qOther = DB::table('aldp_details')
                    ->select('aldp_details.*')
                    ->where('aldp_details.aldp_id','=', $id);

        $functional_all     = $learning->where('aldp_details.competency_type','=', '1')->count();
        $functional_comp    = $learning->where('aldp_details.competency_type','=', '1')
                                       ->where('learnings.status','=',2)
                                       ->count();

        $other_all          = $learning->where('aldp_details.competency_type','=', '1')->count();
        $other_comp         = $learning->where('aldp_details.competency_type','=', '1')
                                       ->where('learnings.status','=',2)
                                       ->count();

        $cnl_all            = $learning->where('aldp_details.competency_type','=', '2')->count();
        $cnl_comp           = $learning->where('aldp_details.competency_type','=', '2')
                                       ->where('learnings.status','=',2)
                                       ->count();

        if(!empty($functional_all)){
            $functional_percent = ($functional_comp / $functional_all) * 100;
        }else{
            $functional_percent = 0;
        }


        if(!empty($cnl_all)){
            $cnl_percent = ($cnl_comp / $cnl_all) * 100;
        }else{
            $cnl_percent = 0;
        }



        if(!empty($other_all)){
            $other_percent = ($other_comp / $other_all) * 100;
        }else{
            $other_percent = 0;
        }



        return view('section.aldp.detail', [
            'title'             => 'ALDP Details',
            'title2'            => $title->get(),
            'functional'        => $basequery->where('aldp_details.competency_type','=', '1')->get(),
            'functional_all'    => $functional_all,
            'functional_comp'   => $functional_comp,
            'functional_percent'=> $functional_percent,
            'cnl'               => $basequery->where('aldp_details.competency_type','=', '2')->get(),
            'cnl_all'           => $cnl_all,
            'cnl_comp'          => $cnl_comp,
            'cnl_percent'       => $cnl_percent,
            'other'             => $qOther->where('aldp_details.competency_type','=', '3')->get(),
            'other_all'         => $other_all,
            'other_comp'        => $other_comp,
            'other_percent'     => $other_percent,
            'id_aldp'           => $id,
            'assessment_data'   => DB::table('assessments')->where('assessment_id', $id)->get()
        ]);
    }


    public function edit(AldpSection $aldpSection)
    {
        //
    }

    public function update(Request $request, AldpSection $aldpSection)
    {
        //
    }

    public function destroy(AldpSection $aldpSection)
    {
        //
    }

    public function formParticipant($aldp_detail_id, $aldp_id)
    {
        $idLogin    = auth()->user()->employee_id;

        // dd($aldp_detail_id);
        // $data = DB::table('assessment_details')
        //             ->join('assessments', 'assessments.id', '=', 'assessment_details.assessment_id')
        //             ->where('assessment_details.actual_result', '2')
        //             ->where('assessment_details.item_id', $item_id)
        //             ->select('employee_id')
        //             ->get();
    
        $data   = DB::table('learnings')
                        ->join('employees', 'employees.employee_id', '=', 'learnings.employee_id')
                        ->select('learnings.*', 'employees.employee_name', 'employees.position')
                        ->where('learnings.aldp_detail_id', $aldp_detail_id);

        $employee   = DB::table('employees')
                        ->where('sm_code', $idLogin)->get();

        $item   = DB::table('aldp_details')->where('id', $aldp_detail_id)->get();
        foreach ($item as $vItem) :
            $item_id = $vItem->item_id;
            $item_name = $vItem->item_name;
        endforeach;

        return view('section.aldp.participant', [
            'title'             => 'Add Participant',
            'id_aldp'           => $aldp_id,
            'id_aldp_details'   => $aldp_detail_id,
            'data'              => $data->paginate(10)->withQueryString(),
            'employee'          => $employee,
            'item_id'           => $item_id,
            'item_name'         => $item_name
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

        DB::table('learnings')->insert($validation);
        return redirect('/participant/'. $aldp_detail.'/'.$aldp)->with('success', 'New data has been addedd!');
    }

    public function deleteParticipat(Request $request)
    {
        $learning_id    = $request->input('id_learning');
        $aldp_id        = $request->input('id_aldp');
        $aldp_detail_id    = $request->input('aldp_detail_id');

        DB::table('learnings')->where('id', $learning_id)->delete();

        return redirect('/participant/'. $aldp_detail_id.'/'.$aldp_id)->with('success', 'Data has been Deleted!');
    }

    public function submitForm(Request $request)
    {

        $data = $request->input('id');

        DB::table('aldps')->where('id', $data)->update(['status' => 2]);
        return redirect('/aldpSection')->with('success', 'Assessment has been updated!');
    }
}
