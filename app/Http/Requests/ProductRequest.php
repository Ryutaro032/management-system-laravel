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
            'product_name' => 'required',
            'company_name' => 'required',
            'comment' => 'max:5000',
            'img_path' => 'required|file|image'
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'product_name.max' => ':attributeは:max字以内で入力してください。',
            'company_name.max' => ':attributeは:max字以内で入力してください。',
            'comment.max' => ':attributeは:max字以内で入力してください。',
        ];
    }
}
