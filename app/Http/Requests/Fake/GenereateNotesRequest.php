<?php

namespace App\Http\Requests\Fake;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class GenereateNotesRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'amount' => 'required|integer|min:1|max:100',
        ];
    }

    public function getUserModel(): User
    {
        return User::find($this->user_id);
    }
}
