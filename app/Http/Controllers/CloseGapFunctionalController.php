<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CloseGapFunctionalController extends Controller
{
    // public function index(Request $request, $id)
    // {
    //     //session
    //     $area           = $request->session()->get('local');
    //     $roleId         = $request->session()->get('roleId');
    //     $idLogin        = $request->session()->get('user');
    //     $dEmployee      = DB::table('employees')
    //                         ->where('employees.employee_id', '=', $idLogin );


    //     $qFuncLeader = DB::table('learnings as l')
    //             ->join('employees as e', 'l.employee_id', '=', 'e.employee_id')
    //             ->join('aldp_details as ad', 'l.aldp_detail_id', '=', 'ad.id')
    //             ->join('items as i', 'l.item_id', '=', 'i.item_id')
    //             ->select('l.id', 'e.employee_id', 'e.employee_name', 'l.item_id', 'i.item_name', 'l.started_at', 'l.finished_at', 'l.comment', 'l.evidence', 'l.status');
    //     $qOther = DB::table("learnings as l")
    //             ->join('employees as e', 'e.employee_id', '=', 'l.employee_id')
    //             ->join('aldp_details as ad', 'ad.id', '=', 'l.aldp_detail_id')
    //             ->select('l.id', 'e.employee_id', 'e.employee_name', 'l.item_id', 'l.item_name', 'l.started_at', 'l.finished_at', 'l.comment', 'l.evidence', 'l.status');

    //     if($id == "Fc") {
    //         $data = $qFuncLeader;
    //         $title = 'Close Gap Activity - Functional';
    //         $competency_id = 1;
    //     }elseif($id == "Ld"){
    //         $data = $qFuncLeader;
    //         $title = 'Close Gap Activity - Leadership';
    //         $competency_id = 2;
    //     }else{
    //         $data = $qOther;
    //         $title = 'Close Gap Activity - Other';
    //         $competency_id = 3;
    //     }
    //     return view('admin.closegap.functional', [
    //         'title'             => $title,
    //         'employeeSession'   => $dEmployee->first(),
    //         'area'              => $area,
    //         'roleId'            => $roleId,
    //         'data'              => $data->where('ad.competency_type', $competency_id)->get(),
    //         'submitted'         => 'btn-white',
    //         'reviewed'          => 'btn-white',
    //         'completed'         => 'btn-white',
    //         'all'               => 'btn-warning',
    //         'competency_id'     => $id
    //     ]);
    // }


    // public function submitted(Request $request, $id)
    // {
    //     //session
    //     $area           = $request->session()->get('local');
    //     $roleId         = $request->session()->get('roleId');
    //     $idLogin        = $request->session()->get('user');
    //     $dEmployee      = DB::table('employees')
    //                         ->where('employees.employee_id', '=', $idLogin );

    //     $funclead = DB::table('learnings as l')
    //                 ->join('employees as e', 'l.employee_id', '=', 'e.employee_id')
    //                 ->join('aldp_details as a', 'l.aldp_detail_id', '=', 'a.id')
    //                 ->join('items as i', 'l.item_id', '=', 'i.item_id')
    //                 ->select('l.id', 'e.employee_id', 'e.employee_name', 'l.item_id', 'i.item_name', 'l.started_at', 'l.finished_at', 'l.comment', 'l.evidence', 'l.status');
    //     $qOther = DB::table("learnings as l")
    //                 ->join('employees as e', 'e.employee_id', '=', 'l.employee_id')
    //                 ->join('aldp_details as ad', 'ad.id', '=', 'l.aldp_detail_id')
    //                 ->select('l.id', 'e.employee_id', 'e.employee_name', 'l.item_id', 'l.item_name', 'l.started_at', 'l.finished_at', 'l.comment', 'l.evidence', 'l.status');

    //     if(request('search')) {
    //         $funclead->where('i.item_id', 'like', '%' . request('search') . '%')
    //                ->orWhere('e.employee_id', 'like', '%' . request('search') . '%')
    //                ->orWhere('e.employee_name', 'like', '%' . request('search') . '%')
    //                ->orWhere('i.item_name', 'like', '%' . request('search') . '%');
    //     }


    //     if($id == "Fc") {
    //         $data = $funclead;
    //         $title = 'Close Gap Activity - Functional Submitted';
    //         $competency_id = 1;
    //     } else if ($id == "Ld") {
    //         $data = $funclead;
    //         $title = 'Close Gap Activity - Leadership Submitted';
    //         $competency_id = 2;
    //     } else {
    //         $data = $qOther;
    //         $title = 'Close Gap Activity - Other Submitted';
    //         $competency_id = 3;
    //     }

    //     return view('admin.closegap.functional', [
    //         'title'     => $title,
    //         'employeeSession'   => $dEmployee->first(),
    //         'area'              => $area,
    //         'roleId'            => $roleId,
    //         'data'              => $data->where('a.competency_type', $competency_id)->get(),
    //         'submitted'         => 'btn-warning',
    //         'reviewed'          => 'btn-white',
    //         'completed'         => 'btn-white',
    //         'all'               => 'btn-white',
    //         'competency_id'     => $id
    //     ]);
    // }

    public function index(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);



        if ($request->ajax()) {
            $search = DB::table('learnings as l')
                ->join('employees as e', 'l.employee_id', '=', 'e.employee_id')
                ->join('aldp_details as ad', 'l.aldp_detail_id', '=', 'ad.id')
                ->where('ad.competency_type', 1)
                ->join('items as i', 'l.item_id', '=', 'i.item_id')
                ->select(
                    'l.id',
                    'e.employee_name',
                    'i.item_name',
                    'l.started_at',
                    'l.finished_at',
                    'l.comment',
                    'l.evidence',
                    'l.status',
                );

            return DataTables::of($search)->make(true);
            // Implement search functionality
            // $searchValue = $request->input('search');


            // if (!empty('search')) {
            //     $search->where(function ($query) use ($searchValue) {
            //         $query->where('e.employee_name', 'like', '%' . $searchValue . '%')
            //             ->orWhere('i.item_name', 'like', '%' . $searchValue . '%')
            //             ->orWhere('l.started_at', 'like', '%' . $searchValue . '%')
            //             ->orWhere('l.finished_at', 'like', '%' . $searchValue . '%')
            //             ->orWhere('l.comment', 'like', '%' . $searchValue . '%')
            //             ->orWhere('l.evidence', 'like', '%' . $searchValue . '%')
            //             ->orWhere('l.status', 'like', '%' . $searchValue . '%');
            //     });
            // }
        }

        return view('admin.closegap.index', [
            'title'             => 'Close Gap Activity - Functional All',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'submitted'         => 'btn-white',
            'competency_type'   => 1,
            'status'            => 0,
            'reviewed'          => 'btn-white',
            'completed'         => 'btn-white',
            'all'               => 'btn-warning'
        ]);
    }



    public function submitted(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        if ($request->ajax()) {
            $search = DB::table('learnings as l')
                ->join('employees as e', 'l.employee_id', '=', 'e.employee_id')
                ->join('aldp_details as ad', 'l.aldp_detail_id', '=', 'ad.id')
                ->where('ad.competency_type', 1)
                ->where('l.status', 1)
                ->join('items as i', 'l.item_id', '=', 'i.item_id')
                ->select(
                    'l.id',
                    'e.employee_name',
                    'i.item_name',
                    'l.started_at',
                    'l.finished_at',
                    'l.comment',
                    'l.evidence',
                    'l.status',
                );
            return DataTables::of($search)->make(true);
        }

        return view('admin.closegap.index', [
            'title'             => 'Close Gap Activity - Functional Submitted',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'submitted'         => 'btn-warning',
            'competency_type'   => 1,
            'status'            => 1,
            'reviewed'          => 'btn-white',
            'completed'         => 'btn-white',
            'all'               => 'btn-white'
        ]);
    }



    public function preview(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        if ($request->ajax()) {
            $search = DB::table('learnings as l')
                ->join('employees as e', 'l.employee_id', '=', 'e.employee_id')
                ->join('aldp_details as ad', 'l.aldp_detail_id', '=', 'ad.id')
                ->join('items as i', 'l.item_id', '=', 'i.item_id')
                ->where('ad.competency_type', 1)
                ->Where('l.status', 2)
                ->select(
                    'l.id',
                    'e.employee_name',
                    'i.item_name',
                    'l.started_at',
                    'l.finished_at',
                    'l.comment',
                    'l.evidence',
                    'l.status'
                );
            return DataTables::of($search)->make(true);
        }

        return view('admin.closegap.index', [
            'title'             => 'Close Gap Activity - Functional Reviewed',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'submitted'         => 'btn-white',
            'competency_type'   => 1,
            'status'            => 2,
            'reviewed'          => 'btn-warning',
            'completed'         => 'btn-white',
            'all'               => 'btn-white'
        ]);
    }



    public function completed(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
            ->where('employees.employee_id', '=', $idLogin);

        if ($request->ajax()) {
            $search = DB::table('learnings as l')
                ->join('employees as e', 'l.employee_id', '=', 'e.employee_id')
                ->join('aldp_details as ad', 'l.aldp_detail_id', '=', 'ad.id')
                ->join('items as i', 'l.item_id', '=', 'i.item_id')
                ->where('ad.competency_type', 1)
                ->where('l.status', 3)
                ->select(
                    'l.id',
                    'e.employee_name',
                    'i.item_name',
                    'l.started_at',
                    'l.finished_at',
                    'l.comment',
                    'l.evidence',
                    'l.status'
                );
            return DataTables::of($search)->make(true);
        }

        return view('admin.closegap.index', [
            'title'             => 'Close Gap Activity - Functional Completed',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'submitted'         => 'btn-white',
            'competency_type'   => 1,
            'status'            => 3,
            'reviewed'          => 'btn-white',
            'completed'         => 'btn-warning',
            'all'               => 'btn-white'
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

        if ($data['status'] == 3) {
            DB::table('learnings')->where('id', $id)->update($data);
            // dd($checkData->id);
            DB::table('assessment_details')->where('id', $checkData->id)->update(['actual_result' => 1]);
        } else {
            DB::table('learnings')->where('id', $id)->update($data);
            DB::table('assessment_details')->where('id', $checkData->id)->update(['actual_result' => 2]);
        }

        return response()->json(['message' => 'Data berhasil diperbarui']);
    }

    public function updateDataOther()
    {
        dd('hallo');
    }
}
