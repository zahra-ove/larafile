<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFileRequest extends FormRequest
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
            // 'file_code'       =>  'required|string',
            'file_name'       =>  'required|string',
            'price'           =>  'required|string',
            'description'     =>  'nullable|string',
            'file_path'       =>  'nullable|string',
            'download_count'  =>  'nullable|numeric',
            'view_count'      =>  'nullable|numeric',
            'category_id'     =>  'required|numeric',
            'file_size'       =>  'nullable|string',
            'time'            =>  'nullable|string',
            'type_id'         =>  'nullable|numeric',
            'description'     =>  'nullable|string',
            'image'           =>  'nullable|image|max:2049'
        ];
    }
}
