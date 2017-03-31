<?php

namespace eeducar\Http\Controllers;

use eeducar\Ano;
use eeducar\Http\Requests\AnoRequest;

class AnoController extends Controller
{
    /**M�todo que redireciona para p�gina inicial de anos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $anos = Ano::paginate(config('constantes.paginacao'));  //Busca todos os anos
        return view('ano.index', compact('anos'));              //Redireciona � p�gina inicial de anos
    }

    public function novo()
    {
        return view('ano.novo');
    }


    public function salvar()
    {

    }

    public function editar($id)
    {

    }

    public function alterar(AnoRequest $request, $id)
    {

    }

    public function excluir($id)
    {

    }
}
