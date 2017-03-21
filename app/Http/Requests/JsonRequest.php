<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JsonRequest extends FormRequest
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
            'data. * .first_name' => 'required|json',
            'data. * .last_name' => 'required|json',
            'data. * .age' => 'required|integer|json',
            'data. * .email' => 'required|email|json',
            'data. * .secret' => 'required|json'
        ];
    }
}
