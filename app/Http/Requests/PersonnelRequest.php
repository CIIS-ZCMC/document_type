<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelRequest extends FormRequest
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
            ];
        } else {
            return [
                'name' => 'required|string|max:255',
                'position_id' => 'required|exists:positions,id',
                'id' => 'required|exists:personnels,id'
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Personnel name is required.',
            'id.required'  => 'Personnel does not exist'
        ];
    }

}
