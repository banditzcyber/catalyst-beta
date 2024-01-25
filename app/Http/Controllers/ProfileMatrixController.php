<?php

namespace App\Http\Controllers;

use App\Models\ProfileMatrix;
use App\Http\Requests\StoreProfileMatrixRequest;
use App\Http\Requests\UpdateProfileMatrixRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProfileMatrixImport;

class ProfileMatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $search = DB::table('profile_matrices')->orderby('created_at', 'desc');

        if(request('search')) {
            $search->where('section', 'like', '%' . request('search') . '%')
                   ->orWhere('competency_id', 'like', '%' . request('search') . '%')
                   ->orWhere('competency_name', 'like', '%' . request('search') . '%')
                   ->orWhere('jobcode', 'like', '%' . request('search') . '%')
                   ->orWhere('jobcode_future', 'like', '%' . request('search') . '%');
        }

        return view('admin.matrix.index', [
            'title'     => 'Profile Matrices',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'      => $search->paginate(10)->withQueryString(),
            'countData' =>$search->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $data   = DB::table('employees')->distinct('employees.jobcode')->select('jobcode', 'position', 'section', 'job_level')->orderby('section','desc')->get();
        $competency = DB::table('competencies')->get();

        return view('admin.matrix.create', [
            'title'         => 'Add Profile Matriix',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'          => $data,
            'competency'    => $competency
        ]);
    }


    public function store(StoreProfileMatrixRequest $request)
    {
        // dd('test');

        $validatation   = $request->validate([
            'section'               => '',
            'position'              => 'required',
            'position_title'        => 'required',
            'competency_id'         => 'required',
            'competency_name'       => 'required',
            'jobcode'               => 'required',
            'level'                 => 'required',
            'position_future'        => 'required',
            'position_title_future' => 'required',
            'jobcode_future'        => 'required',
            'level_future'          => 'required'
        ]);

        $validatation['status']     = 1;


        DB::table('profile_matrices')->insert($validatation);

        return redirect('/matrix')->with('success','Data has beed added!');
    }


    public function show(ProfileMatrix $profileMatrix)
    {
        //
    }


    public function edit(ProfileMatrix $profileMatrix)
    {
        //
    }


    public function update(UpdateProfileMatrixRequest $request, ProfileMatrix $profileMatrix)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('profile_matrices')->where('id', $id)->delete();
        return redirect('/matrix')->with('success','Data has been deleted!');
    }

    public function importData(Request $request){
        // dd($request);
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv', // Add any validation rules you need
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $import = new ProfileMatrixImport();
            Excel::import($import, $path);
            // You can also add success or error handling here
            return redirect('/matrix')->with('success', 'Imprort data has been succesed!');
        }

        return redirect('/matrix')->with('warning', 'Imprort data failed!');
    }

    public function editData(Request $request, $id)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $data       = DB::table('profile_matrices')->where('id', $id)->first();
        $competency = DB::table('competencies')->get();
        $employee   = DB::table('employees')->get();


        return view('admin.matrix.edit', [
            'title'         => 'Edit Profile Matriix',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'          => $data,
            'competency'    => $competency,
            'employee'      => $employee
        ]);
    }
}
