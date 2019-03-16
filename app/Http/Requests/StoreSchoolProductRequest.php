<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Resources\SchoolProductResource;

class StoreSchoolProductRequest extends FormRequest
{
    private $schoolProduct;

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
        $this->schoolProduct = $this->school->schoolProducts()->create([
            'product_id' => $this->product_id,
            'price' => $this->price
        ]);

        $this->schoolProduct = $this->schoolProduct->query()->with('product')->first();

        return $this;
    }

    public function response()
    {
        return SchoolProductResource::make($this->schoolProduct)->response()->setStatusCode(201);
    }
}
