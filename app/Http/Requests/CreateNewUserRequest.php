<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewUserRequest extends FormRequest
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
            'username' => 'required|min:2|max:40',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ];
    }
}
