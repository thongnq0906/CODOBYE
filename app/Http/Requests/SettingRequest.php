<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|max:200',
            'address' => 'string|max:200',
            'phone' => 'number|regex:/(0)[0-9]{9,10}/|max:11',
            'holine' => 'number|regex:/(0)[0-9]{9,10}/|max:11',
            'title' => 'string|max:200',
            'facebook' => 'string|max:200',
            'zalo' => 'string|max:200',
        ];
    }
}
