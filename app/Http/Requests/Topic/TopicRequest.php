<?php

namespace App\Http\Requests\Topic;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
            'title' => 'required|unique:topics,title,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'Tên chủ đề đã tồn tại!',
            'title.required' => 'Tên chủ đề không được để trống!',
        ];
    }
}
