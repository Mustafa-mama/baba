<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
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
            'cat' => 'required|array|min:1',
            'cat.*.name' => 'required',
            'cat.*.abrr' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'هذا الحقل مطلوب',
            
        ];
    }
}
