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
            'name' => 'required|max:50',
            'category_number' => 'required',
            'introduction' => 'required|max:1000',
            'amount' => 'required',
            'price' => 'required',
            'origin' => 'required',
            'image' => 'image|nullable',
        ];
    }

    public function attributes()
    {
        return[
            'name' => '商品名',
            'category_number' => 'カテゴリー',
            'amount' => '販売量',
            'price' => '販売価格',
            'origin' => '生産地',
            'introduction' => '紹介文',
            'image' => '画像',
        ];
    }
}
