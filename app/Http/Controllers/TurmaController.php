<?php

namespace eeducar\Http\Controllers;

use eeducar\Ano;
use eeducar\Disciplina;
use eeducar\Http\Requests\TurmaRequest;
use eeducar\Professor;
use eeducar\Turma;

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
        $turnos=config('constantes.turnos');
        $anos = Ano::pluck('codigo','id');
        $disciplinas = Disciplina::pluck('nome','id');
        $professores = Professor::pluck('nome','id');
        return view('turma.novo', compact('turnos','anos','disciplinas','professores'));
    }

    public function salvar(TurmaRequest $request)
    {

    }

    public function editar($id)
    {

    }

    public function alterar(TurmaRequest $request, $id)
    {

    }

    public function excluir($id)
    {

    }
}
