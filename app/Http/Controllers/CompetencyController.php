<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Http\Requests\StoreCompetencyRequest;
// use App\Http\Requests\UpdateCompetencyRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;

use App\Imports\CompetenciesImport;

class CompetencyController extends Controller
{

    public function index()
    {
        $search = DB::table('competencies')->orderby('id', 'desc');

        if(request('search')) {
            $search->where('competency_id', 'like', '%' . request('search') . '%')
                   ->orWhere('competency_name', 'like', '%' . request('search') . '%')
                   ->orWhere('competency_area', 'like', '%' . request('search') . '%')
                   ->orWhere('competency_type', 'like', '%' . request('search') . '%');
        }

        return view('admin.competency.index', [
            'title'     => 'Competency',
            'data'      => $search->paginate(10)->withQueryString(),
            'countData' => $search->count()
        ]);
    }

    public function create()
    {
        return view('admin.competency.create', [
            'title'         => 'Add Data Competency'
        ]);
    }

    public function store(StoreCompetencyRequest $request)
    {

        $validation     = $request->validate([
            'competency_id'         => 'required',
            'competency_area'       => 'required',
            'competency_type'       => 'required',
            'competency_name'       => 'required',
            'competency_bahasa'     => '',
            'description'           => '',
            'description_bahasa'    => '',
            'status'                => ''
        ]);

        DB::table('competencies')->insert($validation);
        return redirect('/competency')->with('success', 'New data has been addedd!');
    }

    public function show(Competency $competency)
    {
        //
    }

    public function edit($id)
    {
        $query = DB::table('competencies')
                    ->where('competency_id', $id)
                    ->first();
        // dd($query);
        return view('admin.competency.edit', [
            'title'         => 'Add Data Competency',
            'data'          => $query
        ]);
    }

    public function update(UpdateCompetencyRequest $request, Competency $competency)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('competencies')->where('competency_id', $id)->delete();
        return redirect('/competency')->with('success', 'Data has been deleted!');
    }

    public function importData(Request $request){
        // dd($request);
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls', // Add any validation rules you need
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $import = new CompetenciesImport();
            Excel::import($import, $path);
            // You can also add success or error handling here
            return redirect('/competency')->with('success', 'Imprort data has been succesed!');
        }

        return redirect('/competency')->with('warning', 'Imprort data failed!');
    }

    public function form()
    {
        return view('admin.competency.form');
    }

    public function saveData() {

        $data = array(
            'competency_id'         => $request->competency_id,
            'competency_area'       => $request->competency_area,
            'competency_type'       => $request->competency_type,
            'competency_name'       => $request->competnecy_name,
            'competency_bahasa'     => $request->competency_bahasa,
            'description'           => $request->description,
            'description_bahasa'    => $request->description_bahasa,
            'status'                => 1
        );

        DB::table('competencies')->insert($data);
    }

    public function updateData(Request $request)
    {
        $validation     = $request->validate([
            'competency_id'         => 'required',
            'competency_area'       => 'required',
            'competency_type'       => 'required',
            'competency_name'       => 'required',
            'competency_bahasa'     => '',
            'description'           => '',
            'description_bahasa'    => '',
            'status'                => ''
        ]);

        $id         = $request->input('id_competency');

        DB::table('competencies')->where('id', $id)->update($validation);
        return redirect('/competency')->with('success', 'New data has been addedd!');
    }
}
