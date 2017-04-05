<?php

namespace eeducar\Http\Controllers;

use eeducar\Ano;
use eeducar\Disciplina;
use eeducar\Http\Requests\TurmaRequest;
use eeducar\Professor;
use eeducar\Turma;

class TurmaController extends Controller
{
    /**Método que redireciona para página inicial de semestres
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $turmas = Turma::paginate(config('constantes.paginacao'));  //Busca todas as turmas
        return view('turma.index', compact('turmas'));          //Redireciona à página inicial de turmas
    }

    public function novo()
    {
        $turnos = config('constantes.turnos');
        $anos = Ano::pluck('codigo', 'id');
        $disciplinas = Disciplina::orderBy('nome')->pluck('nome', 'id');
        $professores = Professor::orderBy('nome')->pluck('nome', 'id');
        return view('turma.novo', compact('turnos', 'anos', 'disciplinas', 'professores'));
    }

    public function salvar(TurmaRequest $request)
    {
        $this->validate($request,
            ['codigo' => 'unique:turmas,codigo']);
        $turma = Turma::create($request->all());
        $disciplinas = $request->disciplinas;
        $professores = $request->professores;
        for ($i = 0; $i < count($disciplinas); $i++) {
            $turma->disciplinas()->attach($disciplinas[$i], ['professor_id' => $professores[$i]]);
        }
        return redirect('turmas');
    }

    public function editar($id)
    {
        $turnos = config('constantes.turnos');
        $anos = Ano::pluck('codigo', 'id');
        $disciplinas = Disciplina::orderBy('nome')->pluck('nome', 'id');
        $professores = Professor::orderBy('nome')->pluck('nome', 'id');
        $turma = Turma::with(['ano', 'disciplinas', 'professores'])->find($id);
        return view('turma.editar', compact('turma', 'turnos', 'anos', 'disciplinas', 'professores'));
    }

    public function alterar(TurmaRequest $request, $id)
    {
        $this->validate($request,
            ['codigo' => 'unique:turmas,codigo,' . $id]);
    }

    public function excluir($id)
    {

    }
}
