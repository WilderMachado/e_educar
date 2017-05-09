<?php

namespace eeducar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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
            'matricula' => 'required|min:6',
            'nome' => 'required|min:5',
            'email' => 'email',
            'foto' => 'image',
            'turma_id'=>'required',
            'responsavel_id' => 'nullable|exists:users,id',
            'responsavel.nome' => 'required_without:responsavel_id|min:5',
            'responsavel.email' => 'required_without:responsavel_id|email',
            'responsavel.password' => 'required_without:responsavel_id|confirmed'
        ];
    }

    public function attributes()
    {
        return [
            'matricula'=>'matrícula do aluno',
            'nome'=>'nome do aluno',
            'email'=>'e-mail do aluno',
            'turma_id'=>'turma',
            'responsavel_id'=>'responsável',
            'responsavel.nome'=>'nome do responsável',
            'responsavel.email'=>'e-mail do responsável',
            'responsavel.password'=>'senha do responsável'
        ];
    }
}
