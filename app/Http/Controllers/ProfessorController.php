<?php

namespace eeducar\Http\Controllers;

use eeducar\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**M�todo que redireciona para p�gina inicial de professores
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $professores = Professor::orderBy('nome')
            ->paginate(config('constantes.paginacao'));                     //Busca professores ordenando por nome
        return view('professor.index', ['professores' => $professores]);  //Redireciona � p�gina inicial de professores
    }
}
