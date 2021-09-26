<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:30',
            'file'=>'image|mimes:png,jpg,jpeg,gif|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'user name hk dc de trong',
            'email.required'=>'email hk dc de trong',
            'email.email'=>'email sai',
            'email.unique'=>'email bij trung',
            'password.required'=>'password hk dc trong',
            'password.min'=>'password phai tren 8 ky tu',
            'password.max'=>'password qua dai',
            'file.mimes'=>'chi upload file hinh anh',
            'file.max'=>'file qua lon'
        ];
    }
}
