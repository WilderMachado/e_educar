<?php

namespace eeducar\Http\Controllers;

use eeducar\Resposta;
use Illuminate\Http\Request;

class RespostaController extends Controller
{
    /**M�todo que redireciona para p�gina inicial de respostas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $respostas = Resposta::paginate(config('constantes.paginacao'));            //Busca todas as respostas
        return view('resposta.index', ['respostas' => $respostas]);                //Redireciona � p�gina inicial de respostas
    }
}
