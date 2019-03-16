<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolRequest extends FormRequest implements ApiRequest
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
            'name' => 'string',
            'city' => 'string',
            'zip' => 'digits:5',
            'circulation' => 'numeric',
            'state_id' => 'integer|exists:states,id'
        ];
    }

    public function handle()
    {
        $this->school->update($this->all());
        
        return $this;
    }

    public function response()
    {
        return response(['success' => true], 204);
    }
}
