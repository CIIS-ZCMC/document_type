<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *s
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
        if ($this->method() == "POST") {
            return [
                'name' => 'required|string|max:255',
              
            ];
        } else {
            return [
                'name' => 'required|string|max:255',
                'id' => 'required|exists:positions,id|max:255',
             
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Position name is required.',
            'id.required'  => 'Position does not exist'
        ];
    }
}
