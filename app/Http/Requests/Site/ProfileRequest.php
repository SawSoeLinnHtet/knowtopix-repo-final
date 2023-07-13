<?php

namespace App\Http\Requests\Site;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use PyaeSoneAung\MyanmarPhoneValidationRules\MyanmarPhone;

class ProfileRequest extends FormRequest
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
        $id = Auth::user()->id;
        $rules = [
            'name' => 'required|between:10,25',
            'username' => 'required|regex:/^[a-zA-Z0-9 ]+$/|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => ['required', new MyanmarPhone, 'unique:users,phone,' . $id],
        ];
        return $rules;
    }
}
