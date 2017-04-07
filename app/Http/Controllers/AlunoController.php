<?php

namespace eeducar\Http\Controllers;

use eeducar\Aluno;
use eeducar\Http\ManipuladorArquivo;
use eeducar\Http\Requests\AlunoRequest;
use eeducar\Turma;


class AlunoController extends Controller
{
    /**
     * Método que redireciona para página inicial de alunos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome')
            ->paginate(config('constantes.paginacao')); //busca relação de alunos em ordem alfabética utilizando páginação
        return view('aluno.index', compact('alunos'));  //Redireciona para a view com os alunos
    }

    public function novo()
    {
        $turmas = Turma::orderBy('codigo')->pluck('codigo','id');
        return view('aluno.novo', compact('turmas'));
    }

    public function salvar(AlunoRequest $request)
    {
        $this->validate($request,
            ['matricula' => 'unique:alunos,matricula',
                'email' => 'unique:alunos,email',
            ]);
        $aluno = new Aluno($request->all());
       /* $codigo_aluno = $aluno->codigo;
        $imagem = $request->file('foto');

        $codigo_aluno .= '.' . $imagem->getClientOriginalExtension();
        $diretorio = 'public/' . 'alunos';
        $imagem->move($diretorio, $codigo_aluno);
        $aluno->foto = $diretorio . '/' . $codigo_aluno;*/

        $aluno->foto = ManipuladorArquivo::salvar($request->file('foto'), 'aluno', $aluno->codigo);
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
