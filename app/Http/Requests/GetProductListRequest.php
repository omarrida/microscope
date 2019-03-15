<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Resources\ProductResource;

class GetProductListRequest extends FormRequest implements ApiRequest
{
    private $products;

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
        $this->products = \App\Product::all();

        return $this;
    }

    public function response()
    {
        return ProductResource::collection($this->products);
    }
}
