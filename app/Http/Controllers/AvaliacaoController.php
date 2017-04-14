<?php

namespace eeducar\Http\Controllers;

use eeducar\Ano;
use eeducar\Avaliacao;
use eeducar\Http\Requests\AvaliacaoRequest;
use eeducar\Pergunta;
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
        return view('avaliacao.index', compact('avaliacoes'));              //Redireciona para p�gina inicial de avalia��es
    }

    public function novo()
    {
        $anos = Ano::pluck('codigo','id');
        $perguntas = Pergunta::pluck('enunciado','id');
        return view('avaliacao.novo',compact('anos','perguntas'));
    }

    public function salvar()
    {

    }

    public function editar($id)
    {

    }

    public function alterar(AvaliacaoRequest $request, $id)
    {

    }

    public function excluir($id)
    {

    }
}
