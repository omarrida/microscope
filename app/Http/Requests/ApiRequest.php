<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

interface ApiRequest
{
    public function handle();

    public function response();
}
