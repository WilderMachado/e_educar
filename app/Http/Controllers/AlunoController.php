<?php

namespace eeducar\Http\Controllers;

use eeducar\Aluno;
use eeducar\Http\ManipuladorArquivo;
use eeducar\Http\Requests\AlunoRequest;
use eeducar\Turma;
use eeducar\User;


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
        $turmas = Turma::orderBy('codigo')->pluck('codigo','id');
        $responsaveis = User::where('role','responsavel')->orderBy('name')->pluck('name','id');
        return view('aluno.novo', compact('turmas','responsaveis'));
    }

    public function salvar(AlunoRequest $request)
    {
        $this->validate($request,
            ['matricula' => 'unique:alunos,matricula',
                'email' => 'unique:alunos,email',
            ]);
        $aluno = new Aluno($request->all());
       /* $codigo_aluno = $alunos->codigo;
        $imagem = $request->file('foto');

        $codigo_aluno .= '.' . $imagem->getClientOriginalExtension();
        $diretorio = 'public/' . 'alunos';
        $imagem->move($diretorio, $codigo_aluno);
        $alunos->foto = $diretorio . '/' . $codigo_aluno;*/

        $aluno->foto = ManipuladorArquivo::salvar($request->file('foto'), 'alunos', $aluno->matricula);
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
