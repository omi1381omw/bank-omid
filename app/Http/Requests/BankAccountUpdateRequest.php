<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountUpdateRequest extends FormRequest
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
            'account_number' => 'required|max:24',
            'sheba' => 'required|max:24|unique:bank_accounts,sheba,' . $this->id,
            'cart' => 'required|max:16|unique:bank_accounts,cart,' . $this->id,
            'balance' => 'required|max:200',
        ];
    }
}
