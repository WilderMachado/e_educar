<?php

namespace eeducar\Http\Controllers;

use eeducar\Aluno;
use eeducar\Http\ManipuladorArquivo;
use eeducar\Http\Requests\AlunoRequest;
use eeducar\Turma;


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
        $turmas = Turma::all();
        return view('aluno.novo', compact('turmas'));
    }

    public function salvar(AlunoRequest $request)
    {
        $this->validate($request,
            ['matricula' => 'unique:alunos,matricula',
                'email' => 'unique:alunos,email',
            ]);
        $aluno = new Aluno($request->all());
        $aluno->foto = ManipuladorArquivo::salvar($request->file('foto'), 'aluno', $aluno->nome);
        $aluno->save();
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
