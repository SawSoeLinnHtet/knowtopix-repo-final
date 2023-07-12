<?php

namespace App\Http\Requests\Site\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'required|max:25',
            'username' => "required|regex:/(^([a-zA-z1-9]+)(\d+)?$)/u|unique:users,username",
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|between:8,20'
        ];
    }
}
