<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = DB::table('employees')->orderby('created_at', 'asc');

        if (request('search')) {
            $search->where('employee_id', 'like', '%' . request('search') . '%')
                ->orWhere('employee_name', 'like', '%' . request('search') . '%')
                ->orWhere('division', 'like', '%' . request('search') . '%')
                ->orWhere('department', 'like', '%' . request('search') . '%')
                ->orWhere('jobcode', 'like', '%' . request('search') . '%')
                ->orWhere('section', 'like', '%' . request('search') . '%')
                ->orWhere('position', 'like', '%' . request('search') . '%');
        }

        return view('admin.employees.index', [
            'title'     => 'Employees',
            'data'      => $search->paginate(10)->withQueryString(),
            'countData' => $search->count()
        ]);
    }


    public function create()
    {
        //
    }


    public function store(StoreEmployeeRequest $request)
    {
        //
    }


    public function show(Employee $employee)
    {
        //
    }


    public function edit(Employee $employee)
    {
        //
    }


    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }


    public function destroy($id)
    {
        DB::table('employees')->where('id', $id)->delete();
        return redirect('/employees')->with('success', 'Data has been deleted!');
    }

    public function importData(Request $request)
    {
        // dd($request);
        DB::table('employees')->delete();

        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv', // Add any validation rules you need
        ]);

        if ($request->hasFile('file')) {

            DB::table('employees')->delete();

            $path = $request->file('file')->getRealPath();
            $import = new EmployeeImport();
            Excel::import($import, $path);

            // You can also add success or error handling here
            return redirect('/employees')->with('success', 'Imprort data has been succesed!');
        }

        return redirect('/employees')->with('warning', 'Imprort data failed!');
    }
}
