<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStore extends FormRequest
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
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:students',
                'max:191'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You most enter your name',
            'email.required' => 'You most enter your email',
            'email.email' => 'You should enter valid email like email@gmail.com',
        ];
    }
}
