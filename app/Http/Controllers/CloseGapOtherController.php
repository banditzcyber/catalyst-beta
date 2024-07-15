<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CloseGapOtherController extends Controller
{
    public function index(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        if ($request->ajax()) {
            $search = DB::table('learnings as l')
                        ->join('employees as e', 'l.employee_id', '=', 'e.employee_id')
                        ->join('aldp_details as ad', 'l.aldp_detail_id', '=', 'ad.id')
                        ->where('ad.competency_type', 3)
                        ->select(
                            'l.id', 
                            'e.employee_name', 
                            'l.item_name', 
                            'l.started_at', 
                            'l.finished_at', 
                            'l.comment', 
                            'l.evidence', 
                            'l.status',
                        );
                        return DataTables::of($search)->make(true);
            }

        // if(request('search')) {
        //     $search->where('i.item_id', 'like', '%' . request('search') . '%')
        //            ->orWhere('e.employee_id', 'like', '%' . request('search') . '%')
        //            ->orWhere('e.employee_name', 'like', '%' . request('search') . '%')
        //            ->orWhere('i.item_name', 'like', '%' . request('search') . '%');
        // }

        return view('admin.closegap.index', [
            'title'     => 'Close Gap Activity - Other All',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            // 'data'              => $search->get(),
            'submitted'         => 'btn-white',
            'competency_type'   => 3,
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
                            ->where('employees.employee_id', '=', $idLogin );

        if ($request->ajax()) {
            $search = DB::table('learnings as l')
                        ->join('employees as e', 'l.employee_id', '=', 'e.employee_id')
                        ->join('aldp_details as ad', 'l.aldp_detail_id', '=', 'ad.id')
                        ->where('ad.competency_type', 3)
                        ->where('l.status', 1)
                        ->select(
                            'l.id', 
                            'l.item_name', 
                            'e.employee_name', 
                            'l.started_at', 
                            'l.finished_at', 
                            'l.comment', 
                            'l.evidence', 
                            'l.status'
                        );
                        return DataTables::of($search)->make(true);
            }

        // if(request('search')) {
        //     $search->where('i.item_id', 'like', '%' . request('search') . '%')
        //            ->orWhere('e.employee_id', 'like', '%' . request('search') . '%')
        //            ->orWhere('e.employee_name', 'like', '%' . request('search') . '%')
        //            ->orWhere('i.item_name', 'like', '%' . request('search') . '%');
        // }

        return view('admin.closegap.index', [
            'title'     => 'Close Gap Activity - Leadership Submitted',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            // 'data'              => $search->get(),
            'competency_type'   => 3,
            'status'            => 1,
            'submitted'         => 'btn-warning',
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
                            ->where('employees.employee_id', '=', $idLogin );

        if ($request->ajax()) {
            $search = DB::table('learnings as l')
                        ->join('employees as e', 'l.employee_id', '=', 'e.employee_id')
                        ->join('aldp_details as ad', 'l.aldp_detail_id', '=', 'ad.id')
                        ->where('ad.competency_type', 3)
                        ->where('l.status', 2)
                        ->select(
                            'l.id', 
                            'l.item_name', 
                            'e.employee_name', 
                            'l.started_at', 
                            'l.finished_at', 
                            'l.comment', 
                            'l.evidence', 
                            'l.status'
                        );
                        return DataTables::of($search)->make(true);
            }

        // if(request('search')) {
        //     $search->where('i.item_id', 'like', '%' . request('search') . '%')
        //            ->orWhere('e.employee_id', 'like', '%' . request('search') . '%')
        //            ->orWhere('e.employee_name', 'like', '%' . request('search') . '%')
        //            ->orWhere('i.item_name', 'like', '%' . request('search') . '%');
        // }

        return view('admin.closegap.index', [
            'title'     => 'Close Gap Activity - Leadership Submitted',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            // 'data'              => $search->get(),
            'competency_type'   => 3,
            'status'            => 2,
            'submitted'         => 'btn-white',
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
                            ->where('employees.employee_id', '=', $idLogin );

        if ($request->ajax()) {
            $search = DB::table('learnings as l')
                        ->join('employees as e', 'l.employee_id', '=', 'e.employee_id')
                        ->join('aldp_details as ad', 'l.aldp_detail_id', '=', 'ad.id')
                        ->where('ad.competency_type', 3)
                        ->where('l.status', 3)
                        ->select(
                            'l.id', 
                            'l.item_name', 
                            'e.employee_name', 
                            'l.started_at', 
                            'l.finished_at', 
                            'l.comment', 
                            'l.evidence', 
                            'l.status'
                        );
                        return DataTables::of($search)->make(true);
            }

        // if(request('search')) {
        //     $search->where('i.item_id', 'like', '%' . request('search') . '%')
        //            ->orWhere('e.employee_id', 'like', '%' . request('search') . '%')
        //            ->orWhere('e.employee_name', 'like', '%' . request('search') . '%')
        //            ->orWhere('i.item_name', 'like', '%' . request('search') . '%');
        // }

        return view('admin.closegap.index', [
            'title'     => 'Close Gap Activity - Leadership Submitted',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            // 'data'              => $search->get(),
            'competency_type'   => 3,
            'status'            => 3,
            'submitted'         => 'btn-white',
            'reviewed'          => 'btn-white',
            'completed'         => 'btn-warning',
            'all'               => 'btn-white'
        ]);
    }
}
