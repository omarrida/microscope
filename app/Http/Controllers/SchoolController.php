<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use App\Http\Requests\GetSchoolListRequest;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param GetSchoolListRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(GetSchoolListRequest $request)
    {
        return $request->handle()->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSchoolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchoolRequest $request)
    {
        return $request->handle()->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSchoolRequest  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        return $request->handle()->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}
