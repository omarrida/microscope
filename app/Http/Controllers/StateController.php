<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetStateListRequest;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetStateListRequest $request)
    {
        return $request->handle()->response();
    }
}