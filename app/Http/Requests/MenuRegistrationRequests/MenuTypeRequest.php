<?php

namespace App\Http\Requests\MenuRegistrationRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class MenuTypeRequest extends FormRequest
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
            'menu_type_name' => "required|regex:/(^[A-Za-z\s])/u",
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
            'menu_type_name.required'               =>   'Menu type name is require.',
            'menu_type_name.regex'                  =>   'Menu type name must be only character.',
            'login_id.required'                         =>   'Login Id is require.'
        ];
    }
}
