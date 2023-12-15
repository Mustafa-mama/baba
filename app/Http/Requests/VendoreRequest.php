<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendoreRequest extends FormRequest
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
            'name'      => 'required|string|max:50',
            'cat_id'    => 'required|exists:min_catrgories,id',
            'email'     => 'required|email',
            'phone'     => 'required|max:15|min:10',
            'password'  => 'required_without:id',
            'addres'    => 'required',
           
        ];
    }

    public function messages()
    {
        return [
             'required'  => 'هذا الحقل مطلوب',
             'name.max'  => 'هذا الاسم يجب ان لا يقل عن مئة حرف',
             //'password.min' => 'كلمة المرور يجب ان لاتقل عن اربعة احرف ',
             'phone.int'  => 'هذا الحقل يجب ان يكون ارقام',

        ];
    }
}    