<?php

namespace eeducar\Http\Controllers;

use eeducar\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**Método que redireciona para página inicial de professores
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $professores = Professor::orderBy('nome')
            ->paginate(config('constantes.paginacao'));                     //Busca professores ordenando por nome
        return view('professor.index', ['professores' => $professores]);  //Redireciona à página inicial de professores
    }
}
