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

        $aluno->foto = ManipuladorArquivo::salvar($request->file('foto'), 'alunos', $aluno->matricula);
        $aluno->save();
        return redirect('alunos');
    }

    public function editar($id)
    {
        $turmas = Turma::orderBy('codigo')->pluck('codigo','id');
        //$turmas = Turma::find(Aluno::find($id))->pluck('codigo','id');
       $responsaveis = User::where('role','responsavel')->orderBy('name')->pluck('name','id');
       // $responsaveis = User::find(Aluno::find($id))->orderBy('name')->pluck('name','id');
        $aluno = Aluno::find($id);
        return view('aluno.editar', compact('aluno','turmas','responsaveis'));

    }

    public function alterar(AlunoRequest $request, $id)
    {
        $aluno2 = new Aluno();
        $a = $aluno2::find($id);
        //ManipuladorArquivo::excluir($a->foto);

        $aluno = Aluno::find($id);

        $aluno->foto = ManipuladorArquivo::salvar($request->file('foto'), 'alunos', $request->get('matricula'));
        $aluno->matricula = $request->get('matricula');
        //dd($mta = $aluno->matricula);
        $aluno->update($request->all());

        return redirect('alunos');
    }

    public function excluir($id)
    {
        Aluno::find($id)->delete();
        return redirect('alunos');
    }
}
