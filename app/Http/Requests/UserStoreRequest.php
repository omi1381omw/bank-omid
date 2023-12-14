<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|max:200|email|unique:users,email',
            'mobile' => 'required|max:11|unique:users,mobile',
            'national_code' => 'required|max:11',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'رمز باید حداقل ۸ کاراکتر یا بیشتر باشد'
        ];
    }
}
