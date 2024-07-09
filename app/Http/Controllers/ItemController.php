<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemImport;

class ItemController extends Controller
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

        $search = DB::table('items')->orderby('created_at', 'desc');

        if(request('search')) {
            $search->where('item_id', 'like', '%' . request('search') . '%')
                   ->orWhere('item_name', 'like', '%' . request('search') . '%');
        }

        return view('admin.items.index', [
            'title'     => 'Learning Item',
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    public function edit($id, Request $request)
    {
        //session
        $area           = $request->session()->get('local');
        $roleId         = $request->session()->get('roleId');
        $idLogin        = $request->session()->get('user');
        $dEmployee      = DB::table('employees')
                            ->where('employees.employee_id', '=', $idLogin );

        $query = DB::table('items')
                            ->where('item_id', $id)
                            ->first();


        return view('admin.items.edit', [
            'title'     => 'Learning Item',
            'employeeSession'   => $dEmployee->first(),
            'area'              => $area,
            'roleId'            => $roleId,
            'data'              => $query
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('items')->where('item_id', $id)->delete();
        return redirect('/items')->with('success', 'Data has been deleted!');
    }

    public function importData(Request $request){
        // dd($request);
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv', // Add any validation rules you need
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $import = new ItemImport();
            Excel::import($import, $path);
            // You can also add success or error handling here
            return redirect('/items')->with('success', 'Imprort data has been succesed!');
        }

        return redirect('/items')->with('warning', 'Imprort data failed!');
    }
}
