<?php

namespace App\Http\Controllers;

use App\Models\Mylearning;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MylearningController extends Controller
{
    public function __construct()
    {
        $this->mMyLearning =  new \App\Models\Mylearning();
    }

    public function index(Request $request)
    {
        // $idLogin    = auth()->user()->employee_id;
        $idLogin    = $request->session()->get('user');
        $data = $this->mMyLearning->getData($idLogin);

        return view('employee.mylearning.index', [
            'data'          => $data->get(),
            'title'         => 'My Learning'
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $leaning_id = $request->input('learning_id');
        // dd($validation);
        // return $request->file('evidence')->store('data-evidence');

        $validation = $request->validate([
            'started_at'    => 'required',
            'finished_at'   => 'required',
            'evidence'      => 'required|file|max:1024',
            'comment'       => ''
        ]);

        $validation['status'] = 2;
        $validation['evidence'] = $request->file('evidence')->store('data-evidence');

        DB::table('learnings')->where('id', $leaning_id)->update($validation);
        return redirect('/mylearning')->with('success', 'New data has been addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mylearning  $mylearning
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data   = DB::table('learnings')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                    ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                    ->where('learnings.id', $id)
                    ->get();

        $query  = DB::table('learnings')
                    ->get();

            return view('employee.mylearning.detail', [
                'title'     => 'Detail Learning',
                'data'      => $query,
                'data2'     => $data
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mylearning  $mylearning
     * @return \Illuminate\Http\Response
     */
    public function edit(Mylearning $mylearning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mylearning  $mylearning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mylearning $mylearning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mylearning  $mylearning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mylearning $mylearning)
    {
        //
    }

    public function form($id)
    {

        $data   = DB::table('learnings')
                    ->join('items', 'learnings.item_id', '=', 'items.item_id')
                    ->join('performance_standards', 'items.ps_id', '=', 'performance_standards.ps_id')
                    ->join('competencies', 'performance_standards.competency_id', '=', 'competencies.competency_id')
                    ->where('learnings.id', $id)
                    ->get();

        $query  = DB::table('learnings')
                    ->get();

            return view('employee.mylearning.form', [
                'title'     => 'Form Close Gap',
                'data'      => $query,
                'data2'     => $data,
                'learning_id'   => $id
            ]);
    }
}
