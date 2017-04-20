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
        $anos = Ano::pluck('codigo', 'id');
        $perguntas = Pergunta::all('enunciado', 'id');
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
        $perguntas = Pergunta::all('enunciado', 'id');
        return view('avaliacao.editar', compact('avaliacao', 'anos', 'perguntas'));
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

    public function relatorio($id)
    {
        $avaliacao = Avaliacao::with('perguntas.respostas')->find($id);
        $mpdf = new \mPDF();
        $mpdf->WriteHTML(file_get_contents('css/app.css'), 1);
        //$mpdf->WriteHTML(file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'), 1);
        $mpdf->WriteHTML(view('avaliacao.relatorio',['avaliacao' => $avaliacao]));
        $mpdf->Output();
    }
}
