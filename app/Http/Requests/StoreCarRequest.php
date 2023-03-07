<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreCarRequest extends FormRequest
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
            'car_name' => ['required', 'min:3', 'max:255'],
            'car_plate' => ['required', 'min:3', 'max:10'],
            'car_about' => ['required'],
            'maker_id' => ['required', 'integer', 'min:1']
        ];
    }

    public function messages() {
        return [
            'car_name.min' => 'Automobilio pavadinime turi buti nuo 3 iki 255 simboliu'
        ];
    }
}
