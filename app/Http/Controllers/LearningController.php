<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use App\Http\Requests\StoreLearningRequest;
use App\Http\Requests\UpdateLearningRequest;

class LearningController extends Controller
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
     * @param  \App\Http\Requests\StoreLearningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLearningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function show(Learning $learning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function edit(Learning $learning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLearningRequest  $request
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLearningRequest $request, Learning $learning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Learning  $learning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Learning $learning)
    {
        //
    }
}
