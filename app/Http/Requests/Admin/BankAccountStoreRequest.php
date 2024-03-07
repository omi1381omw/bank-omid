<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountStoreRequest extends FormRequest
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
            'type'=> 'required|numeric',
            'account_number' => 'required|numeric',
            'user_id' => 'required|numeric|exists:users,id',
            'sheba' => 'required|numeric|digits:24',
            'cart' => 'required|numeric|digits:16'
        ];
    }
}