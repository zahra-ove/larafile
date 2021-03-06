<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'fullname'    =>  'nullable|string',
            'username'    =>  'required|string',
            'age'         =>  'nullable|numeric',
            'mobile'      =>  'nullable|string',
            'gender_id'   =>  'nullable|numeric',
            'image'       =>  'nullable|image|max:2048',
        ];
    }
}
