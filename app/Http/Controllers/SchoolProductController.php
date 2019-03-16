<?php

namespace App\Http\Controllers;

use App\SchoolProduct;
use Illuminate\Http\Request;
use App\Http\Requests\GetSchoolProductListRequest;

class SchoolProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetSchoolProductListRequest $request)
    {
        return $request->handle()->response();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SchoolProduct  $schoolProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolProduct $schoolProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SchoolProduct  $schoolProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolProduct $schoolProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolProduct  $schoolProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolProduct $schoolProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SchoolProduct  $schoolProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolProduct $schoolProduct)
    {
        //
    }
}
