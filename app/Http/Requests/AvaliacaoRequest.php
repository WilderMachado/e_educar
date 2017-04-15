<?php

namespace eeducar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvaliacaoRequest extends FormRequest
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
            'ano_id'=>'required',
            'inicio' => 'required|date',
            'termino' => 'required|date|after:inicio',
            'perguntas'=>'required|array|min:2'
        ];
    }
}
