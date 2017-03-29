<?php

namespace eeducar\Http\Controllers;

use eeducar\Avaliacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AvaliacaoController extends Controller
{
    /**M�todo que redireciona para p�gina inicial de avalia��es
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->role == 'responsavel'):                           //Verifica se usu�rio � responsavel
            return redirect()->route('questionarios');                      //Redireciona para question�rio
        endif;
        $avaliacoes = Avaliacao::paginate(config('constantes.paginacao'));  //Busca todas as avalia��es
        return view('avaliacao.index', ['avaliacoes' => $avaliacoes]);     //Redireciona para p�gina inicial de avalia��es
    }

}
