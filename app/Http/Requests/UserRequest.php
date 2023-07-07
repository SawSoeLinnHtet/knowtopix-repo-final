<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
                'name' => 'required|between:10,25',
                'username' => 'required|regex:/^[a-zA-Z0-9 ]+$/|unique:users,username,'. $id,
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => 'required|regex:/^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/|unique:users,phone,' . $id
            ];
        } else {
            return [
                'name' => 'required|between:10,25',
                'username' => "required|regex:/(^([a-zA-z1-9]+)(\d+)?$)/u|unique:users,username",
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|between:8,20',
                'phone' => 'required|regex:/^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/|unique:users,phone',
            ];
        }
    }
}
