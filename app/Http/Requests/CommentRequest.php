<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'name'             =>   'required|string|max:100',
            'email'            =>   'required|email',
            'body'             =>   'required|string|min:3|max:1500',
            'commentable_type' =>   'required|string|max:100',
            'commentable_id'   =>   'required|numeric'
        ];
    }
}
