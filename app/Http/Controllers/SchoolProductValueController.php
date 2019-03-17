<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GetSchoolProductsByValueRequest;

class SchoolProductValueController extends Controller
{
    public function index(GetSchoolProductsByValueRequest $request)
    {
        return $request->handle()->response();
    }
}
