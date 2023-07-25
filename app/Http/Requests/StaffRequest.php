<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use PyaeSoneAung\MyanmarPhoneValidationRules\MyanmarPhone;

class StaffRequest extends FormRequest
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
        if($this->method() == 'PATCH'){
            $id = $request->route('staff')->id;
            return [
                'name' => 'required|between:10,25',
                'email' => 'required|email|unique:staff,email,' . $id,
                'phone' => ['required', new MyanmarPhone, 'unique:users,phone,' . $id]
            ];
        }else{
            return [
                'name' => 'required|between:10,25',
                'email' => 'required|email|unique:staff,email',
                'password' => 'required|confirmed|between:8,20',
                'phone' => ['required', new MyanmarPhone, 'unique:users,phone,']
            ];
        }
    }
}
