<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return filled(user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'per_page' => 'nullable|integer|min:10',
            'page' => 'nullable|integer|min:0',
            'keyword' => 'nullable|string|min:1|max:255',
        ];
    }

    public function getPerPage(): int
    {
        return $this->per_page??10;
    }
}
