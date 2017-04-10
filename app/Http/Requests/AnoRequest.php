<?php

namespace eeducar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'codigo' => 'required|between:4,6',
            'inicio' => 'required|date',
            'termino' => 'required|date|after:inicio'
        ];
    }
}
