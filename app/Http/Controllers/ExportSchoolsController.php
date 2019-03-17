<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExportSchoolsToCsvRequest;

class ExportSchoolsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  ExportSchoolsToCsvRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ExportSchoolsToCsvRequest $request)
    {
        $schools = \App\School::all();
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($schools, ['name', 'city', 'zip', 'circulation', 'state_id'])->download();
    }
}
