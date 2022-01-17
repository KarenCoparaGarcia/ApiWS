<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'document' => 'required|string|min:10|max:10',
            'first_name' => 'required|string',
            'second_name' => 'required|string',
            'phone' => 'required|string|min:9|max:9',
            'mobile_phone' => 'required|string|min:10|max:10',
            'email' => 'required|email|max:100',
            'address' => 'required|string',
        ];
    }
}
