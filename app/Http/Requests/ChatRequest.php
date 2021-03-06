<?php

namespace eeducar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatRequest extends FormRequest
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
            'mensagem'=>'required|max:255',
            //'remetente_id'=>'required|exists:user,id',
            'destinatario_id'=>'nullable|exists:users,id'
        ];
    }
}
