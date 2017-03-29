<?php

namespace eeducar\Http\Controllers;

use eeducar\Avaliacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AvaliacaoController extends Controller
{
    /**Método que redireciona para página inicial de avaliações
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->role == 'responsavel'):                           //Verifica se usuário é responsavel
            return redirect()->route('questionarios');                      //Redireciona para questionário
        endif;
        $avaliacoes = Avaliacao::paginate(config('constantes.paginacao'));  //Busca todas as avaliações
        return view('avaliacao.index', ['avaliacoes' => $avaliacoes]);     //Redireciona para página inicial de avaliações
    }

}
