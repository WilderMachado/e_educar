<?php

namespace eeducar\Http\Controllers;

use eeducar\Aluno;
use eeducar\Http\Requests\AlunoRequest;

class AlunoController extends Controller
{
    /**
     * M�todo que redireciona para p�gina inicial de alunos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome')
            ->paginate(config('constantes.paginacao')); //busca rela��o de alunos em ordem alfab�tica utilizando p�gina��o
        return view('aluno.index', compact('alunos'));  //Redireciona para a view com os alunos
    }

    public function novo()
    {
        return view('aluno.novo');
    }

    public function salvar(AlunoRequest $request)
    {
        $this->validate($request,
            ['matricula' => 'unique:alunos,matricula',
                'email' => 'unique:alunos,email']);                 //Valida matr�cula e email de aluno

        return redirect('alunos');
    }

    public function editar($id)
    {

    }

    public function alterar(AlunoRequest $request, $id)
    {

    }

    public function excluir($id)
    {

    }
}
