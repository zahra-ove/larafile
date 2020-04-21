<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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
            'rateNum'  => 'required|numeric|min:0|max:5',
            'rateType' => 'required|string|max:15',    //type could be "file", "article" and "episode" so 15 characters is enough
            'id'       => 'required|numeric'
        ];
    }
}
