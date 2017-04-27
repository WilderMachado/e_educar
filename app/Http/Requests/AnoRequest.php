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
            'termino' => 'required|date|after:inicio',
            'unidades.*.codigo' => 'distinct|max:6|filled',
            'unidades.*.inicio' => 'date|after_or_equal:inicio',
            'unidades.*.termino' => 'date|before_or_equal:termino|after:unidades.*.inicio',
        ];
    }

    public function attributes()
    {
        return [
            'codigo' => 'código de ano',
            'inicio' => 'início de ano',
            'termino' => 'término de ano',
            'unidades.*.codigo' => 'código de unidade',
            'unidades.*.inicio' => 'início de unidade',
            'unidades.*.termino' => 'término de unidade'
        ];
    }
}