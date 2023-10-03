<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Validator;

//パスワードルールオブジェクトを呼び出す
use Illuminate\Validation\Rules\Password;

class RegistrationRequest extends FormRequest
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
            'name' => 'required | max:30',
            'kana' => 'required | max:30',
            'tel' => 'required | numeric | max_digits:11',
            'email' => 'required | max:100 | email |unique:users,email',
            'password' => ['required',Password::min(8)->letters()->mixedCase()->numbers(), 'max:24', 'confirmed'],
        ];
    }
}

// ->uncompromised(3)