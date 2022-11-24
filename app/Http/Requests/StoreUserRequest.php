<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','alfa'],
            'age' => ['required', 'integer', 'gt:0'],
            'gender' => ['required', 'alfa', Rule::in(['male', 'famele'])],
            'email' => ['required, email:rfc,dns'],
            'password' => [
                'required',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ]
        ];
    }
}
