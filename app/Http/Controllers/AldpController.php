<?php

namespace App\Http\Controllers;

use App\Models\Aldp;
use App\Http\Requests\StoreAldpRequest;
// use App\Http\Requests\UpdateAldpRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AldpController extends Controller
{
    /**
     * Display a listing of the resource.
     * ini tes git
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = DB::table('aldps')
                    ->join('employees', 'aldps.manager_id', '=', 'employees.employee_id')
                    ->select('aldps.id','aldps.manager_id', 'employees.employee_name', 'employees.section', 'aldps.year', 'aldps.comment', 'aldps.status');

        if(request('search')) {
            $search->where('aldps.manager_id', 'like', '%' . request('search') . '%')
                   ->orWhere('employees.employee_name', 'like', '%' . request('search') . '%')
                   ->orWhere('aldps.year', 'like', '%' . request('search') . '%');
        }

        return view('admin.aldp.index', [
            'title'     => 'Annual Learning Development Plan',
            'data'      => $search->paginate(10)->withQueryString(),
            'countData' => $search->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data   = DB::table('employees')->where('job_level', '=', 'SM')->orWhere('job_level', '=', 'DM')
                    ->orWhere('job_level', '=', 'GM')->get();

        return view('admin.aldp.create', [
            'title'         => 'Add Annual Learning Development',
            'data'          => $data
        ]);
    }


    public function store(StoreAldpRequest $request)
    {
        $validation = $request->validate([
            'manager_id'   => 'required',
            'year'          => 'required',
            'comment'          => ''
        ]);

        $validation['status']  = 1;

        DB::table('aldps')->insert($validation);

        return redirect('/aldpAdmin')->with('success', 'Data has been added!');
    }


    public function show(Aldp $aldp, $id)
    {
        $title  = DB::table('aldps')
                    ->join('employees', 'aldps.manager_id', '=', 'employees.employee_id')
                    ->where('aldps.id', '=', $id);

        $basequery = DB::table('aldp_details')
                    ->select('aldp_details.*', 'items.*')
                    ->leftjoin('items','aldp_details.item_id', '=', 'items.item_id')
                    ->where('aldp_details.aldp_id', '=', $id);

        $learning   = DB::table('learnings')
                    ->leftjoin('aldp_details', 'learnings.aldp_detail_id','=', 'aldp_details.aldp_detail_id')
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



        return view('admin.aldp.detail', [
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

            'assessment_data'   => DB::table('assessments')->where('assessment_id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aldp  $aldp
     * @return \Illuminate\Http\Response
     */
    public function edit(Aldp $aldp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAldpRequest  $request
     * @param  \App\Models\Aldp  $aldp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAldpRequest $request, Aldp $aldp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aldp  $aldp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('aldps')->where('id', $id)->delete();
        return redirect('/aldpAdmin')->with('success', 'Data has been deleted!');

    }
}
