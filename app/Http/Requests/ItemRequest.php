<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'imge' => 'required_without:id|mimes:jpg,jpeg,png',
           'item.*.name' => 'required|max:50',
            'item.*.contry' => 'required|max:30',
            'item.*.descrip' => 'required',
            'item.*.status' => 'required',
            'item.*.vendor_id' => 'required',
            'item.*.price' => 'required|int',
            'item' => 'required|array|min:1',
            'item.*.abrr' => 'required',            
            // 'name'      => 'required',
            // 'contry'      => 'required|max:30',
            // 'descrip'      => 'required',
            // 'status'      => 'required',            
            // 'vendor_id'    => 'required|exists:vendores,id',            
            // 'price'     => 'required|int|min:3',
        ];
    }

    public function messages()
    {
        return [
             'required'  => 'هذا الحقل مطلوب',
             'name.max'  => 'هذا الاسم يجب ان لا يقل عن مئة حرف',
             //'password.min' => 'كلمة المرور يجب ان لاتقل عن اربعة احرف ',
             'price.int'  => 'هذا الحقل يجب ان يكون ارقام',

        ];
    }
}
