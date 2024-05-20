<?php

namespace App\Http\Controllers;

use App\Models\SectionArea;
use App\Http\Requests\StoreSectionAreaRequest;
use App\Http\Requests\UpdateSectionAreaRequest;

class SectionAreaController extends Controller
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
     * @param  \App\Http\Requests\StoreSectionAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionAreaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SectionArea  $sectionArea
     * @return \Illuminate\Http\Response
     */
    public function show(SectionArea $sectionArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SectionArea  $sectionArea
     * @return \Illuminate\Http\Response
     */
    public function edit(SectionArea $sectionArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSectionAreaRequest  $request
     * @param  \App\Models\SectionArea  $sectionArea
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSectionAreaRequest $request, SectionArea $sectionArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SectionArea  $sectionArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(SectionArea $sectionArea)
    {
        //
    }
}
