<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            'pet_img' => 'image',
            'name' => 'required | max:30',
            'animal' => 'required | max:50',
            'breed' => 'required | max:100',
            'birth' => 'max:100',
            'sex' => 'required',
        ];
    }
}
