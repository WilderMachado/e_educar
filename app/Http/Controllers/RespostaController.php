<?php

namespace eeducar\Http\Controllers;

use eeducar\Resposta;

class RespostaController extends Controller
{
    /**Método que redireciona para página inicial de respostas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $respostas = Resposta::paginate(config('constantes.paginacao'));    //Busca todas as respostas
        return view('resposta.index', compact('respostas'));                //Redireciona à página inicial de respostas
    }
}
