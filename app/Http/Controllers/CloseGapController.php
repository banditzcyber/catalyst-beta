<?php

namespace App\Http\Controllers;

use App\Models\CloseGap;
use App\Http\Requests\StoreCompetencyRequest;
// use App\Http\Requests\UpdateCompetencyRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;



class CloseGapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = DB::table('learnings')
                    ->join('employees', 'learnings.employee_id', '=', 'employees.employee_id')
                    ->join('aldp_details', 'learnings.aldp_detail_id', '=', 'aldp_details.id')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->select('learnings.id', 'employees.employee_id', 'employees.employee_name', 'learnings.item_id', 'items.item_name', 'learnings.started_at', 'learnings.finished_at', 'learnings.comment', 'learnings.evidence', 'learnings.status');

        if(request('search')) {
            $search->where('items.item_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_name', 'like', '%' . request('search') . '%')
                   ->orWhere('items.item_name', 'like', '%' . request('search') . '%');
        }

        return view('admin.closegap.index', [
            'title'     => 'Close Gap Activity',
            'data'      => $search->paginate(10)->withQueryString()
        ]);
    }

    public function closegapcompleted()
    {

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
            'title'     => 'Close Gap Activity - Completed',
            'data'      => $search->paginate(10)->withQueryString()
        ]);
    }

    public function closegapreview()
    {

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
            'title'     => 'Close Gap Activity - Reviewed',
            'data'      => $search->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.closegap.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validata = $request->validate([
        //     'item_id'  => ''
        // ]);
        $validata['item_id'] = $request->item_id;

        DB::table('learnings')->insert($validata);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CloseGap  $closeGap
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('learnings')
                    ->where('id', $id)
                    ->first();
        return view('admin.closegap.update', [
            'data'  => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CloseGap  $closeGap
     * @return \Illuminate\Http\Response
     */
    public function edit(CloseGap $closeGap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CloseGap  $closeGap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CloseGap $closeGap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CloseGap  $closeGap
     * @return \Illuminate\Http\Response
     */
    public function destroy(CloseGap $closeGap)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $data = $request->input('status');
        $learning_id = $request->input('learning_id');

        DB::table('learnings')->where('learning_id', $learning_id)->update(['status' => $data]);
        return redirect('/closegap')->with('success', 'Data has been updated!');
    }


    public function read() 
    {
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
            'data'      => $search->paginate(10)->withQueryString()
        ]);
    }

    public function onprogress() 
    {
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
            'data'      => $search->paginate(10)->withQueryString()
        ]);
    }

    public function updateData(Request $request, $id)
    {
        $data['status'] = $request->status;

        DB::table('learnings')->where('id', $id)->update($data);
    }
}
