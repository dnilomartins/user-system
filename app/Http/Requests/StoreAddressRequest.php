<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'street' => ['required', 'string'],
            'number' => ['required', 'integer'],
            'city' => ['required', 'alpha'],
            'state' => ['required', 'alpha'],
            'country' => ['required', 'alpha'],
            'user_id' => ['required', 'integer', 'gt:0', 'required', 'exists:users,id']
        ];
    }
}
