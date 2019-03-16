<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroySchoolRequest extends FormRequest implements ApiRequest
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
            //
        ];
    }

    public function handle()
    {
        $this->school->delete();

        return $this;
    }

    public function response()
    {
        return response(['success' => true], 204);
    }
}
