<?php

namespace eeducar\Http\Controllers;

use eeducar\Http\Requests\ProfessorRequest;
use eeducar\Professor;

class ProfessorController extends Controller
{
    /**Método que redireciona para página inicial de professores
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $professores = Professor::orderBy('nome')
            ->paginate(config('constantes.paginacao'));             //Busca professores ordenando por nome
        return view('professor.index',  compact('professores'));    //Redireciona à página inicial de professores
    }

    public function novo()
    {
        return view('professor.novo');
    }

    public function salvar()
    {

    }

    public function editar($id)
    {

    }

    public function alterar(ProfessorRequest $request, $id)
    {

    }

    public function excluir($id)
    {

    }
}
