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
        $anos = Ano::pluck('codigo', 'id');
        $perguntas = Pergunta::all('enunciado','id');
        return view('avaliacao.novo', compact('anos', 'perguntas'));
    }

    public function salvar(AvaliacaoRequest $request)
    {
        $avaliacao = Avaliacao::create($request->all());
        $avaliacao->perguntas()->attach($request->perguntas);
        return redirect('avaliacoes');
    }

    public function editar($id)
    {
        $avaliacao = Avaliacao::find($id);
        $anos = Ano::pluck('codigo', 'id');
        $perguntas = Pergunta::all('enunciado','id');
        return view('avaliacao.editar', compact('avaliacao','anos', 'perguntas'));
    }

    public function alterar(AvaliacaoRequest $request, $id)
    {
        $avaliacao = Avaliacao::find($id);
        $avaliacao->perguntas()->sync($request->perguntas);
        $avaliacao->update($request->all());
        return redirect('avaliacoes');
    }

    public function excluir($id)
    {
        Avaliacao::find($id)->delete();
        return redirect('avaliacoes');
    }
}
