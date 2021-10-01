<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'tensp'=>'required',
            'giasp'=>'required',
            'loaisp'=>'required',
            'thuonghieu'=>'required',
            'hinh'=>'image|mimes:png,jpg,jpeg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'tensp.required'=>'mời nhập tên sản phẩm',
            'giasp.required'=>'mời nhập giá sản phẩm',
            'loaisp.required'=>'mời nhập loại sản phẩm',
            'thuonghieu.required'=>'moi nhap thuong hieu',
            'hinh.max'=>'nhập file quá lớn',
        ];
    }
}
