<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BlogRequest extends FormRequest
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
            'title' => 'required',
            'category_id' => 'required',
            'author_name' => 'required',
            'author_bios' => 'required',
            'email' => 'required|email',
            'sample_file' => 'required|file|mimes:pdf,txt,doc,docx',
            'description' => 'required'
        ];
    }
}
