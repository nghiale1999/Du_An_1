<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdmin extends FormRequest
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
            'avatar'=>'required|image|mimes:png,jpg,jpeg,gif|max:2048',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'name khong dc trong',
            'avatar.required'=>'file hk dc rong',
            'avatar.mimes'=>'file anh loi',
            'avatar.max'=>'file anh qua lon'  
        ];
    }
}
