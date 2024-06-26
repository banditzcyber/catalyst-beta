<?php

namespace App\Http\Controllers;

// use App\Http\Requests\UpdateCompetencyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Models\CloseGap;
// use App\Http\Requests\StoreCompetencyRequest;
// use \Cviebrock\EloquentSluggable\Services\SlugService;
// use Illuminate\Support\Str;
// use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Http\RedirectResponse;


//noted : status [1.Submitted, 2.Reviwed, 3.Approved, 4.Rejected]


class CloseGapController extends Controller
{

    public function index(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $search = DB::table('learnings')
                    ->join('employees', 'learnings.employee_id', '=', 'employees.employee_id')
                    ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->where('learnings.status', 1)
                    ->select('learnings.id', 'employees.employee_id', 'employees.employee_name', 'learnings.item_id', 'items.item_name', 'learnings.started_at', 'learnings.finished_at', 'learnings.comment', 'learnings.evidence', 'learnings.status');

        if(request('search')) {
            $search->where('items.item_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_name', 'like', '%' . request('search') . '%')
                   ->orWhere('items.item_name', 'like', '%' . request('search') . '%');
        }

        return view('admin.closegap.index', [
            'title'     => 'Close Gap Activity - Submitted',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $search->get(),
            'submitted'         => 'btn-warning',
            'reviewed'          => 'btn-white',
            'completed'         => 'btn-white',
            'all'               => 'btn-white'
        ]);
    }

    public function closegapcompleted(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $search = DB::table('learnings')
                    ->join('employees', 'learnings.employee_id', '=', 'employees.employee_id')
                    ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->where('learnings.status', 3)
                    ->select('learnings.id', 'employees.employee_id', 'employees.employee_name', 'learnings.item_id', 'items.item_name', 'learnings.started_at', 'learnings.finished_at', 'learnings.comment', 'learnings.evidence', 'learnings.status');

        if(request('search')) {
            $search->where('items.item_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_name', 'like', '%' . request('search') . '%')
                   ->orWhere('items.item_name', 'like', '%' . request('search') . '%');
        }

        return view('admin.closegap.index', [
            'title'             => 'Close Gap Activity - Completed',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $search->get(),
            'submitted'         => 'btn-white',
            'reviewed'          => 'btn-white',
            'completed'         => 'btn-warning',
            'all'               => 'btn-white'
        ]);
    }

    public function closegapreview(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $search = DB::table('learnings')
                    ->join('employees', 'learnings.employee_id', '=', 'employees.employee_id')
                    ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->where('learnings.status', 2)
                    ->select('learnings.id', 'employees.employee_id', 'employees.employee_name', 'learnings.item_id', 'items.item_name', 'learnings.started_at', 'learnings.finished_at', 'learnings.comment', 'learnings.evidence', 'learnings.status');

        if(request('search')) {
            $search->where('items.item_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_name', 'like', '%' . request('search') . '%')
                   ->orWhere('items.item_name', 'like', '%' . request('search') . '%');
        }

        return view('admin.closegap.index', [
            'title'             => 'Close Gap Activity - Reviewed',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $search->get(),
            'submitted'         => 'btn-white',
            'reviewed'          => 'btn-warning',
            'completed'         => 'btn-white',
            'all'               => 'btn-white'
        ]);
    }

    public function closegapall(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $search = DB::table('learnings')
                    ->join('employees', 'learnings.employee_id', '=', 'employees.employee_id')
                    ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->select('learnings.id', 'employees.employee_id', 'employees.employee_name', 'learnings.item_id', 'items.item_name', 'learnings.started_at', 'learnings.finished_at', 'learnings.comment', 'learnings.evidence', 'learnings.status');


        return view('admin.closegap.index', [
            'title'             => 'Close Gap Activity - All',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $search->get(),
            'submitted'         => 'btn-white',
            'reviewed'          => 'btn-white',
            'completed'         => 'btn-white',
            'all'               => 'btn-warning'
        ]);
    }


    public function create()
    {
        return view('admin.closegap.form');
    }


    public function store(Request $request)
    {
        // $validata = $request->validate([
        //     'item_id'  => ''
        // ]);
        $validata['item_id'] = $request->item_id;

        DB::table('learnings')->insert($validata);
    }



    public function updateStatus(Request $request)
    {
        $data = $request->input('status');
        $learning_id = $request->input('learning_id');

        DB::table('learnings')->where('learning_id', $learning_id)->update(['status' => $data]);
        return redirect('/closegap')->with('success', 'Data has been updated!');
    }


    public function read(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $search = DB::table('learnings')
                    ->join('employees', 'learnings.employee_id', '=', 'employees.employee_id')
                    ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->select('learnings.id', 'employees.employee_id', 'employees.employee_name', 'learnings.item_id', 'items.item_name', 'learnings.started_at', 'learnings.finished_at', 'learnings.comment', 'learnings.status');

        if(request('search')) {
            $search->where('items.item_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_name', 'like', '%' . request('search') . '%')
                   ->orWhere('items.item_name', 'like', '%' . request('search') . '%');
        }

        return view('admin.closegap.data', [
            'title'     => 'Close Gap Activity',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'      => $search->paginate(10)->withQueryString()
        ]);
    }

    public function onprogress(Request $request)
    {

        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $search = DB::table('learnings')
                    ->join('employees', 'learnings.employee_id', '=', 'employees.employee_id')
                    ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->select('learnings.id', 'employees.employee_id', 'employees.employee_name', 'learnings.item_id', 'items.item_name', 'learnings.started_at', 'learnings.finished_at', 'learnings.comment', 'learnings.status');

        if(request('search')) {
            $search->where('items.item_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_name', 'like', '%' . request('search') . '%')
                   ->orWhere('items.item_name', 'like', '%' . request('search') . '%');
        }

        return view('admin.closegap.data', [
            'title'     => 'Close Gap Activity',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'      => $search->paginate(10)->withQueryString()
        ]);
    }

    public function show($id)
    {
        $data = DB::table('learnings')
                    ->where('id', $id)
                    ->first();
        return view('admin.closegap.update', [
            'data'  => $data,

        ]);
    }

    public function updateData(Request $request, $id)
    {
        $item_id = $request->item_id;
        $employee_id = $request->employee_id;
        $data['status'] = $request->status;

        $checkData = DB::table('assessment_details')
                        ->join('assessments', 'assessments.id', '=', 'assessment_details.assessment_id')
                        ->where('assessment_details.item_id', $item_id)
                        ->where('assessments.employee_id', $employee_id)
                        ->where('assessments.status_launch', 1)
                        ->select('assessment_details.id')
                        ->first();

        if($data['status'] == 3){
            DB::table('learnings')->where('id', $id)->update($data);
            DB::table('assessment_details')->where('id', $checkData->id)->update(['actual_result' => 1]);
        }else{
            DB::table('learnings')->where('id', $id)->update($data);
            DB::table('assessment_details')->where('id', $checkData->id)->update(['actual_result' => 2]);
        }

    }
}
