<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Resources\SchoolProductResource;

class GetSchoolProductListRequest extends FormRequest implements ApiRequest
{
    private $schoolProducts;

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
        $this->schoolProducts = $this->school->schoolProducts()->with('product')->get();
    
        return $this;
    }

    public function response()
    {
        return SchoolProductResource::collection($this->schoolProducts);
    }
}
