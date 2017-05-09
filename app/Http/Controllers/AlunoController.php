<?php

namespace eeducar\Http\Controllers;

use eeducar\Aluno;
use eeducar\Http\ManipuladorArquivo;
use eeducar\Http\Requests\AlunoRequest;
use eeducar\Turma;
use eeducar\User;
use Illuminate\Support\Facades\Input;


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
        $turmas = Turma::orderBy('codigo')->pluck('codigo', 'id');
        $responsaveis = User::where('role', 'responsavel')->orderBy('name')->pluck('name', 'id');
        return view('aluno.novo', compact('turmas', 'responsaveis'));
    }

    public function salvar(AlunoRequest $request)
    {
        $this->validate($request,
            ['matricula' => 'unique:alunos,matricula',
                'email' => 'unique:alunos,email',
            ]);
        $aluno = new Aluno($request->all());
        $aluno->foto = ManipuladorArquivo::salvar($request->file('foto'), 'alunos', $aluno->matricula);
        $this->salvarResponsavel($aluno, $request->responsavel_id, $request->responsavel);
        /*$responsavel_id = $request->responsavel_id;
        if ($responsavel_id):
            $aluno->responsavel()->associate($responsavel_id);
        else:
            $dados = $request->responsavel;
            $aluno->responsavel()->associate(User::create([
                'name' => $dados['nome'],
                'email' => $dados['email'],
                'password' => bcrypt($dados['password']),
                'role' => 'responsavel'
            ]));
        endif;*/
        $aluno->save();
        return redirect('alunos');
    }

    public function editar($id)
    {
        $turmas = Turma::orderBy('codigo')->pluck('codigo', 'id');
        //$turmas = Turma::find(Aluno::find($id))->pluck('codigo','id');
        $responsaveis = User::where('role', 'responsavel')->orderBy('name')->pluck('name', 'id');
        // $responsaveis = User::find(Aluno::find($id))->orderBy('name')->pluck('name','id');
        $aluno = Aluno::find($id);
        return view('aluno.editar', compact('aluno', 'turmas', 'responsaveis'));
    }

    public function alterar(AlunoRequest $request, $id)
    {
        $aluno = Aluno::find($id);
        $aluno->fill($request->all());
        $foto = ManipuladorArquivo::salvar($request->file('foto'), 'alunos', $aluno->matricula);
        if ($foto != null && $foto != $aluno->foto):
            ManipuladorArquivo::excluir($aluno->foto);
            $aluno->foto = $foto;
        endif;
        $this->salvarResponsavel($aluno, $request->responsavel_id, $request->responsavel);
        $aluno->save();
        return redirect('alunos');
    }

    public function buscarResponsavel()
    {
        return response()->json(User::select('name', 'email')->find(Input::get('responsavel_id')));
    }

    public function excluir($id)
    {
        Aluno::find($id)->delete();
        return redirect('alunos');
    }

    private function salvarResponsavel(Aluno $aluno, $responsavel_id, $dados)
    {
        if ($responsavel_id):
            $aluno->responsavel()->associate($responsavel_id);
            if ($dados):
                $aluno->responsavel()->update([
                    'name' => $dados['nome'],
                    'email' => $dados['email'],
                    'password' => bcrypt($dados['password']),
                    'role' => 'responsavel'
                ]);
            endif;
        else:
            $aluno->responsavel()->associate(User::create([
                'name' => $dados['nome'],
                'email' => $dados['email'],
                'password' => bcrypt($dados['password']),
                'role' => 'responsavel'
            ]));
        endif;
    }
}
