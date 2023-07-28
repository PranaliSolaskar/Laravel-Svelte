<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'name'=>['required','string'],
            'class_id'=>['required','exits:classes,id'],
            'section_id'=>['required','exits:sections,id'],
            'phone_number'=>['required','string'],
            'email'=>['required','email','unique:students,email']
        ];
    }
}
