<?php

namespace eeducar\Http\Controllers;

use eeducar\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**M�todo que redireciona para p�gina inicial de disciplinas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $disciplinas = Disciplina::orderBy('nome')
            ->paginate(config('constantes.paginacao'));                     //Busca disciplinas em ordem alfab�tica e pagina
        return view('disciplina.index', ['disciplinas' => $disciplinas]);  //Redireciona � p�gina inicial de disciplinas
    }
}
