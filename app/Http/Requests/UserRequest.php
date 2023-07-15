<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use PyaeSoneAung\MyanmarPhoneValidationRules\MyanmarPhone;

class UserRequest extends FormRequest
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
        if ($this->method() == 'PATCH') {
            $id = $request->route('user')->id;
            return [
                'name' => 'required',
                'username' => 'required|regex:/^[a-zA-Z0-9 ]+$/|unique:users,username,'. $id,
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => ['required', new MyanmarPhone, 'unique:users,phone,' . $id]
            ];
        } else {
            return [
                'name' => 'required',
                'username' => "required|regex:/(^([a-zA-z1-9]+)(\d+)?$)/u|unique:users,username",
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|between:8,20',
                'phone' => ['required', new MyanmarPhone, 'unique:users,phone,'],
            ];
        }
    }
}
