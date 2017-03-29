<?php

namespace eeducar\Http\Controllers;

use eeducar\Ano;
use Illuminate\Http\Request;

class AnoController extends Controller
{
    /**M�todo que redireciona para p�gina inicial de semestres
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $anos = Ano::paginate(config('constantes.paginacao'));  //Busca todos os semestres
        return view('ano.index', ['anos' => $anos]);            //Redireciona � p�gina inicial de semestres
    }
}
