<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    private const GUEST_USER_ID = 13;

    public function rules()
    {
        if(Auth::id() == self::GUEST_USER_ID) {
        return [
            //
        ];
    } else {
        return[
            'producer_name' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'introduction' => 'required|max:1000',
            'address' => 'required',
            'email' => 'required|string|email|max:255',
            'introduction-image' => 'file',
        ];
    };
    }
}
