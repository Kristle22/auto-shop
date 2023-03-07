<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreMakerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Request::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'maker_name' => ['required', 'min:3', 'max:64'],
        ];
    }

    public function messages() {
        return [
            'maker_name.required' => 'Gamintojo pavadinime turetu buti nuo 3 iki 64 simboliu'
        ];
    }
}
