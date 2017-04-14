<?php

namespace eeducar\Http\Controllers;

use eeducar\Ano;
use eeducar\Avaliacao;
use eeducar\Http\Requests\AvaliacaoRequest;
use eeducar\Pergunta;
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
        return view('avaliacao.index', compact('avaliacoes'));              //Redireciona para página inicial de avaliações
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
