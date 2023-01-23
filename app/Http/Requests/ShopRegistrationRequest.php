<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ShopRegistrationRequest extends FormRequest
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
            'shop_code' => "required|regex:/(^[A-Za-z0-9])/u",
            'shop_name' => "required|regex:/(^[A-Za-z\s])/u",
            'address'   => "required|regex:/(^[A-Za-z\s])/u",
            'phone_no'  => "required|regex:/(^[0-9])/u",
            'opening_hr' => "required",
            'closing_hr' => "required"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['status' => 'NG', 'message' => $validator->errors()->all()], 422));
    }

    public function messages()
    {
        return [
            'shop_code.required' => "Shop Code is required.",
            'shop_code.regex' => "Shop Code must be charcters and numbers.",
            'shop_name.required' => "Shop name is required.",
            'shop_name.regex' => "Shop name must be charcters.",
            'address.required' => "Address is required.",
            'address.regex' => "Address must be characters.",
            'phone_no.required' => "Phone number is required.",
            'phone_no.regex' => "Phone number must be numbers.",
            'opening_hr.required' => "Opneing hour is required",
            'closing_hr.required' => "Opneing hour is required"
        ];
    }
}
