<?php

namespace eeducar\Http\Controllers;

use eeducar\Http\Requests\PerguntaRequest;
use eeducar\Pergunta;

class PerguntaController extends Controller
{
    /**M�todo que redireciona para p�gina inicial de perguntas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $perguntas = Pergunta::paginate(config('constantes.paginacao'));    //Busca todas as perguntas
        return view('pergunta.index', compact('perguntas'));                //Redireciona � p�gina inicial de perguntas
    }

    public function novo()
    {
        return view('pergunta.novo');
    }

    public function salvar()
    {

    }

    public function editar($id)
    {

    }

    public function alterar(PerguntaRequest $request, $id)
    {

    }

    public function excluir($id)
    {

    }
}
