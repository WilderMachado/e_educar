<?php

namespace eeducar\Http\Controllers;

use eeducar\Ano;
use Illuminate\Http\Request;

class AnoController extends Controller
{
    /**Método que redireciona para página inicial de semestres
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $anos = Ano::paginate(config('constantes.paginacao'));  //Busca todos os semestres
        return view('ano.index', ['anos' => $anos]);            //Redireciona à página inicial de semestres
    }
}
