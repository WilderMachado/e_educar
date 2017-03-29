<?php

namespace eeducar\Http\Controllers;

use eeducar\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**Método que redireciona para página inicial de disciplinas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $disciplinas = Disciplina::orderBy('nome')
            ->paginate(config('constantes.paginacao'));                     //Busca disciplinas em ordem alfabética e pagina
        return view('disciplina.index', ['disciplinas' => $disciplinas]);  //Redireciona à página inicial de disciplinas
    }
}
