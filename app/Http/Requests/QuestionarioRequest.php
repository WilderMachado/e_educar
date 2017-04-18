<?php

namespace eeducar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class QuestionarioRequest extends FormRequest
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
        $qtd=count(Input::get('pergunta_id'));
        return [
           'pergunta_id'=>'required|array',
           'campo_resposta'=>'required|array|size:'.$qtd,
           'campo_resposta.*'=>'max:255'
        ];
    }

    public function attributes()
    {
        return [
            'campo_resposta.*' => 'resposta',
            'campo_resposta' => 'resposta'
        ];
    }
}
