<?php

namespace App\Http\Requests\MenuRegistrationRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class MenuRegistrationRequest extends FormRequest
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
            'shop_code' => "required",
            'menu_name' => "required|regex:/(^[A-Za-z])/u",
            'menu_category_id'=> "required",
            'menu_type_id' => "required",
            'menu_price.*.meat_id' => "required",
            'menu_price.*.price' => "required|regex:/(^[0-9])/u",
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
            'shop_code.required'               =>   'Shop Code is require.',
            'menu_name.required'               =>   'Menu name is require.',
            'menu_name.regex'                  =>   'Menu name must be only characters.',
            'login_id.required'                =>   'Login Id is require.',
            'menu_category_id.required'        =>   'Menu Category is require.',
            'menu_type_id.required'            =>   'Menu Type is require.',
            'menu_price.*.meat_id.required'    =>   'Meat Type is require.',
            'menu_price.*.meat_id.price'       =>   'The price is require.',
            'menu_price.*.meat_id.regex'       =>   'The price must be only numbers'
        ];
    }
}
