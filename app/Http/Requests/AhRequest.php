<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AhRequest extends FormRequest
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
            'ah_img' => 'image',
            'name' => 'required | max:30',
            'explanation' => 'nullable',
            'time' => 'required',
            'animal' => 'required',
            // 'emergency' => ,
            // 'trimming' => ,
            // 'hotel' => ,
            // 'reservation' => ,
            'address' => 'required',
            'tel' => 'required | numeric | max_digits:11',
            'parking' => 'max:100',
            'insurance' => 'max:100',
            'hp' => 'url | max:100 | nullable',
            'user_id' => 'required',
        ];
    }
}
