<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=> 'required|max:150',
            'description'=> 'required|max:150',
            'body'=> 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio',
            'title.max' => 'il campo titolo può contenere al massimo 150 caratteri',
        ];
    }
}
