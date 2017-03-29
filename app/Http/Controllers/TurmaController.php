<?php

namespace eeducar\Http\Controllers;

use eeducar\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**M�todo que redireciona para p�gina inicial de semestres
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $turmas = Turma::paginate(config('constantes.paginacao'));  //Busca todas as turmas
        return view('turma.index', ['turmas' => $turmas]);          //Redireciona � p�gina inicial de turmas
    }
}