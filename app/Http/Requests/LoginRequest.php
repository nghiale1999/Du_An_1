<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required',
            'password'=>'required',
            'click'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'email hk dc de trong',
            'password.required'=>'password hk dc de trong',
            'click.required'=>'click dong y'
        ];
    }
}
