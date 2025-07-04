<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            //
            'name' => ['required', 'string', 'max:255'],
            'skill_level' => ['required', 'string', 'max:255'],
            'thumbnail' => ['sometimes', 'image', 'mimes:jpg,jpeg,png'],
            'category_id' => ['required', 'integer'],
            'budget' => ['required', 'integer'],
            'about' => ['required', 'string', 'max:65535'],
        ];
    }
}
