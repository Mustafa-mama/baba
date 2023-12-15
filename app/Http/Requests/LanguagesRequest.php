<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguagesRequest extends FormRequest
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
            'name' => 'required|max:100',
            'abrr' => 'required|max:10',
            'direction' => 'required|in:ltr,rtl',
            //'active' => 'in:0,1',

        ];
    }

    public function messages()
    {
        return [
             'required' => 'هذا الحقل مطلوب',
             'name.max'  =>'هذا الاسم يجب ان لا يقل عن مئة حرف'
           ];
    }
}
