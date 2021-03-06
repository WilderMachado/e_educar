<?php

namespace eeducar\Http\Controllers;

use eeducar\Ano;
use eeducar\Disciplina;
use eeducar\Http\Requests\TurmaRequest;
use eeducar\Professor;
use eeducar\Turma;
use Illuminate\Support\Facades\Auth;

class TurmaController extends Controller
{
    /**M�todo que redireciona para p�gina inicial de semestres
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $turmas = Turma::paginate(config('constantes.paginacao'));  //Busca todas as turmas
        return view('turma.index', compact('turmas'));          //Redireciona � p�gina inicial de turmas
    }

    public function novo()
    {
        $niveis = config('constantes.niveis');
        $turnos = config('constantes.turnos');
        $anos = Ano::pluck('codigo', 'id');
        $disciplinas = Disciplina::orderBy('nome')->pluck('nome', 'id');
        $professores = Professor::orderBy('nome')->pluck('nome', 'id');
        return view('turma.novo', compact('niveis', 'turnos', 'anos', 'disciplinas', 'professores'));
    }

    public function salvar(TurmaRequest $request)
    {
        $this->validate($request,
            ['codigo' => 'unique:turmas,codigo']);
        $turma = Turma::create($request->all());
        $disciplinas = $request->disciplinas;
        $professores = $request->professores;
        $disciplinaProfessor = array();
        for ($i = 0; $i < count($disciplinas); $i++):
            $disciplinaProfessor[$disciplinas[$i]] = ['professor_id' => $professores[$i]];
        endfor;
        $turma->disciplinas()->attach($disciplinaProfessor);
        return redirect('turmas');
    }

    public function editar($id)
    {
        $niveis = config('constantes.niveis');
        $turnos = config('constantes.turnos');
        $anos = Ano::pluck('codigo', 'id');
        $disciplinas = Disciplina::orderBy('nome')->pluck('nome', 'id');
        $professores = Professor::orderBy('nome')->pluck('nome', 'id');
        $turma = Turma::with('ano', 'disciplinas', 'professores')->find($id);
        $disciplinasProfessores = $turma->disciplinaProfessor()->get();
        return view('turma.editar', compact('niveis', 'turma', 'turnos', 'anos', 'disciplinas', 'professores', 'disciplinasProfessores'));
    }

    public function alterar(TurmaRequest $request, $id)
    {
        $this->validate($request,
            ['codigo' => 'unique:turmas,codigo,' . $id]);
        $turma = Turma::find($id);
        $disciplinas = $request->disciplinas;
        $professores = $request->professores;
        $disciplinaProfessor = array();
        for ($i = 0; $i < count($disciplinas); $i++):
            $disciplinaProfessor[$disciplinas[$i]] = ['professor_id' => $professores[$i]];
        endfor;
        $turma->disciplinas()->sync($disciplinaProfessor);
        $turma->update($request->all());
        return redirect('turmas');
    }

    public function excluir($id)
    {
        $turma = Turma::find($id);
        if (Auth::user()->cant('excluir', $turma)):
            abort(403);
        endif;
        $turma->delete();
        return redirect('turmas');
    }
}
