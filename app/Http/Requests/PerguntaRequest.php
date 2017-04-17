<?php

namespace eeducar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerguntaRequest extends FormRequest
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
            'enunciado' => 'required',
            'pergunta_fechada' => 'boolean',
            'opcoes_resposta' => 'required_with:pergunta_fechada|array|min:2',
            'opcoes_resposta.*' => 'string|distinct'
        ];
    }

    public function messages()
    {
        return [
            'distinct' => 'campo :attribute possui valores repetidos.'
        ];
    }

    public function attributes()
    {
        return [
            'opcoes_resposta.*' => 'opções de resposta',
            'opcoes_resposta' => 'opções de resposta'
        ];
    }
}
