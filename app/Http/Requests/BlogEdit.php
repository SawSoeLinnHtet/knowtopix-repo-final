<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogEdit extends FormRequest
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
        $id = $this->route('blog')->id;

        return [
            'logo' => 'file|mimes:png,jpeg,jpg',
            'title' => 'required',
            'category_id' => 'required',
            'author_name' => 'required',
            'author_bios' => 'required',
            'email' => 'required|email|unique:blogs,email,'.$id,
            'description' => 'required'
        ];
    }
}
