<?php

namespace eeducar\Http\Controllers;

use eeducar\Disciplina;
use eeducar\Http\Requests\DisciplinaRequest;

class DisciplinaController extends Controller
{
    /**M�todo que redireciona para p�gina inicial de disciplinas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $disciplinas = Disciplina::orderBy('nome')
            ->paginate(config('constantes.paginacao'));             //Busca disciplinas em ordem alfab�tica e pagina
        return view('disciplina.index', compact('disciplinas'));    //Redireciona � p�gina inicial de disciplinas
    }

    public function novo()
    {
        return view('disciplina.novo');
    }

    public function salvar()
    {

    }

    public function editar($id)
    {

    }

    public function alterar(DisciplinaRequest $request, $id)
    {

    }

    public function excluir($id)
    {

    }
}
