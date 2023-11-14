<?php

namespace App\Http\Controllers;

use App\Models\PerformanceStandard;
use App\Http\Requests\StorePerformanceStandardRequest;
use App\Http\Requests\UpdatePerformanceStandardRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PerformanceStandardImport;

class PerformanceStandardController extends Controller
{

    public function index()
    {
        $search = DB::table('performance_standards')->orderby('id', 'desc');

        if(request('search')) {
            $search->where('ps_id', 'like', '%' . request('search') . '%')
                   ->orWhere('ps_name', 'like', '%' . request('search') . '%');
        }

        return view('admin.ps.index', [
            'title'     => 'Performance Standard',
            'data'      => $search->paginate(10)->withQueryString(),
            'countData' => $search->count()
        ]);
    }


    public function create()
    {
        //
    }


    public function store(StorePerformanceStandardRequest $request)
    {
        //
    }


    public function show(PerformanceStandard $performanceStandard)
    {
        //
    }


    public function edit(PerformanceStandard $performanceStandard)
    {
        //
    }

    public function update(UpdatePerformanceStandardRequest $request, PerformanceStandard $performanceStandard)
    {
        //
    }


    public function destroy($id)
    {
        DB::table('performance_standards')->where('ps_id', $id)->delete();
        return redirect('/performance')->with('success', 'Data has been deleted!');
    }

    public function importData(Request $request){
        // dd($request);
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv', // Add any validation rules you need
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $import = new PerformanceStandardImport();
            Excel::import($import, $path);
            // You can also add success or error handling here
            return redirect('/performance')->with('success', 'Imprort data has been succesed!');
        }

        return redirect('/performance')->with('warning', 'Imprort data failed!');
    }
}
