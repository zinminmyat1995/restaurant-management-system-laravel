<?php

namespace App\Http\Requests\MenuRegistrationRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MeatRequest extends FormRequest
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
            'meat' => "required|regex:/(^[A-Za-z])/u",
            'login_id' => "required"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['status' => 'NG', 'message' => $validator->errors()->all()], 422));
    }

    public function messages()
    {
        return[
            'meat.required'               =>   'Meat type is require.',
            'meat.regex'                  =>   'Meat type must be only character.',
            'login_id.required'           =>   'Login Id is require.'
        ];
    }
}
