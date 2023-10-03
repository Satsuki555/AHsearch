<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\TokenExpirationTimeRule;

//パスワードルールオブジェクトを呼び出す
use Illuminate\Validation\Rules\Password;

class ResetPasswordRequest extends FormRequest
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
            'password' => ['required',Password::min(8)->letters()->mixedCase()->numbers(), 'max:24', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
            'reset_token' => ['required', new TokenExpirationTimeRule],
        ];
    }
}
