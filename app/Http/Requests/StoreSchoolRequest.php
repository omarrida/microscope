<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Resources\SchoolResource;

class StoreSchoolRequest extends FormRequest implements ApiRequest
{
    private $school;

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
            'name' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|digits:5',
            'circulation' => 'required|numeric',
            'state_id' => 'required|integer|exists:states,id'
        ];
    }

    public function handle()
    {
        $this->school = \App\School::create([
            'name' => $this->name,
            'city' => $this->city,
            'zip' => $this->zip,
            'circulation' => $this->circulation,
            'state_id' => $this->state_id
        ]);

        return $this;
    }

    public function response()
    {
        return SchoolResource::make($this->school->fresh())->response()->setStatusCode(201);
    }
}
