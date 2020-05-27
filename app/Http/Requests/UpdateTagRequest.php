<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateTagRequest extends FormRequest
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
            'description'  =>  'nullable|string',
            'name'         =>  'required|string|max:50'  // I could not be successful for writing a code to check the uniqueness of tag name


            // 'name' => [
            //     'required',
            //     Rule::unique('tags', 'name')->ignore($this->tag)
            // ]
        ];
    }
}
