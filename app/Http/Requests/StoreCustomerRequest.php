<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'cedula'=>'required|unique:customers|min:7|numeric',
            'first_name'=>'required|min:2|max:30',
            'last_name'=>'required|min:2|max:30',
            'phone'=>'required|numeric',
            'email'=>'required|email|min:5|max:30',
            'address' => 'required|min:6|max:60'
        ];
    }
}
