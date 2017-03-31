<?php

namespace eeducar\Http\Controllers;

use eeducar\Http\Requests\TurmaRequest;
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
        return view('turma.novo');
    }

    public function salvar()
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
