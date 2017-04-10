<?php

namespace eeducar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmaRequest extends FormRequest
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
            'codigo' =>'required|between:6,10',
            'descricao' => 'required|max:50',
            'nivel' => 'required|max:20',
            'serie' => 'required|max:20',
            'turno'=>'required',
            'ano_id'=>'required',
            'disciplinas'=>'required|array|min:1',
            'professores'=>'required|array|min:1'
        ];
    }
}
