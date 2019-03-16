<?php

namespace App\Http\Controllers;

use App\SchoolProduct;
use Illuminate\Http\Request;
use App\Http\Requests\GetSchoolProductListRequest;
use App\Http\Requests\StoreSchoolProductRequest;
use App\Http\Requests\UpdateSchoolProductRequest;
use App\Http\Requests\DestroySchoolProductRequest;

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
     * Store a newly created resource in storage.
     *
     * @param  StoreSchoolProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchoolProductRequest $request)
    {
        return $request->handle()->response();
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
     * Update the specified resource in storage.
     *
     * @param  UpdateSchoolProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSchoolProductRequest $request)
    {
        return $request->handle()->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroySchoolProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroySchoolProductRequest $request)
    {
        return $request->handle()->response();
    }
}
