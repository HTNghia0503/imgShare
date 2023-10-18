<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'title' =>  'required|max:20',
    ];
}

    public function messages()
    {
        return [
            'title.required' => 'Title không được để trống!',
            'title.max' => 'Title không được quá 20 kí tự!',
        ];
    }

}
