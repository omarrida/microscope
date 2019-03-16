<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Resources\StateResource;

class GetStateListRequest extends FormRequest implements ApiRequest
{
    private $states;

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
        $this->states = \App\State::paginate();

        return $this;
    }

    public function response()
    {
        return StateResource::collection($this->states);
    }
}
