<?php

namespace App\Http\Controllers;

use App\Models\DepartArea;
use App\Http\Requests\StoreDepartAreaRequest;
use App\Http\Requests\UpdateDepartAreaRequest;

class DepartAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDepartAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartAreaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepartArea  $departArea
     * @return \Illuminate\Http\Response
     */
    public function show(DepartArea $departArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepartArea  $departArea
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartArea $departArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartAreaRequest  $request
     * @param  \App\Models\DepartArea  $departArea
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartAreaRequest $request, DepartArea $departArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepartArea  $departArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartArea $departArea)
    {
        //
    }
}
