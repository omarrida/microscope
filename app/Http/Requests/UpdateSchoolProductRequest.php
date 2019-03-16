<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolProductRequest extends FormRequest implements ApiRequest
{
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
            'product_id' => 'required|integer|exists:products,id',
            'price' => 'required|integer|min:0'
        ];
    }

    public function handle()
    {
        $this->schoolProduct->update($this->all());
        
        return $this;
    }

    public function response()
    {
        return response(['success' => true], 204);
    }
}
