<?php

namespace App\Http\Requests;

use App\Http\Resources\SchoolResource;
use Illuminate\Foundation\Http\FormRequest;

class GetSchoolListRequest extends FormRequest implements ApiRequest
{
    private $schools;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function handle()
    {
        $this->schools = \App\School::with('state', 'schoolProducts.product')->get();

        return $this;
    }

    public function response()
    {
        return SchoolResource::collection($this->schools);
    }
}
