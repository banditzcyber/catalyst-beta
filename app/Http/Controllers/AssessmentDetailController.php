<?php

namespace App\Http\Controllers;

use App\Models\AssessmentDetail;
use App\Http\Requests\StoreAssessmentDetailRequest;
use App\Http\Requests\UpdateAssessmentDetailRequest;

class AssessmentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        var_dump('hallo');
        die;
        return view('admin.assessment.index', [
            'title'     => 'Assessmemnt Details',
            'id'        => $id
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
     * @param  \App\Http\Requests\StoreAssessmentDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssessmentDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssessmentDetail  $assessmentDetail
     * @return \Illuminate\Http\Response
     */
    public function show(AssessmentDetail $assessmentDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessmentDetail  $assessmentDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(AssessmentDetail $assessmentDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssessmentDetailRequest  $request
     * @param  \App\Models\AssessmentDetail  $assessmentDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssessmentDetailRequest $request, AssessmentDetail $assessmentDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssessmentDetail  $assessmentDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssessmentDetail $assessmentDetail)
    {
        //
    }
}
