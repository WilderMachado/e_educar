<?php

namespace eeducar\Http\Controllers;

use eeducar\Http\Requests\PerguntaRequest;
use eeducar\OpcaoResposta;
use eeducar\Pergunta;

class PerguntaController extends Controller
{
    /**Método que redireciona para página inicial de perguntas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $perguntas = Pergunta::paginate(config('constantes.paginacao'));    //Busca todas as perguntas
        return view('pergunta.index', compact('perguntas'));                //Redireciona à página inicial de perguntas
    }

    public function novo()
    {
        return view('pergunta.novo');
    }

    public function salvar(PerguntaRequest $request)
    {
        $pergunta = Pergunta::create($request->all());
        if ($pergunta->pergunta_fechada):
            $this->inserirOpcoes($pergunta,$request->opcoes_resposta);
        endif;
        return redirect('perguntas');
    }

    public function editar($id)
    {
        $pergunta = Pergunta::with('opcoesResposta')->find($id);
        return view('pergunta.editar', compact('pergunta'));
    }

    public function alterar(PerguntaRequest $request, $id)
    {
        $pergunta = Pergunta::find($id);
        if ($pergunta->pergunta_fechada && !$request->pergunta_fechada):
            $this->removerOpcoes($pergunta);
            $pergunta->pergunta_fechada = false;
        else:
            $opcoes = $request->opcoes_resposta;
            if (!$pergunta->pergunta_fechada && $request->pergunta_fechada):
                $this->inserirOpcoes($pergunta, $opcoes);
            elseif (count($opcoes) == $pergunta->opcoesResposta->count()):
                $this->atualizarOpcoes($pergunta, $opcoes);
            elseif (count($opcoes) > $pergunta->opcoesResposta->count()):
                $this->aumentarOpcoes($pergunta, $opcoes);
            elseif (count($opcoes) < $pergunta->opcoesResposta->count()):
                $this->diminuirOpcoes($pergunta, $opcoes);
            endif;
        endif;
        $pergunta->update($request->all());
        return redirect('perguntas');
    }

    public function excluir($id)
    {
        $pergunta = Pergunta::find($id);
        $this->removerOpcoes($pergunta);
        $pergunta->delete();
        return redirect('perguntas');
    }

    private function removerOpcoes(Pergunta $pergunta)
    {
        OpcaoResposta::destroy($pergunta->opcoesResposta->pluck('id')->toArray());
    }

    private function inserirOpcoes(Pergunta $pergunta, Array $opcoes)
    {
        foreach ($opcoes as $opcao):
            $pergunta->opcoesResposta()->create(['resposta_opcao' => $opcao]);
        endforeach;
    }

    private function atualizarOpcoes(Pergunta $pergunta, Array $opcoes)
    {
        foreach ($pergunta->opcoesResposta as $i => $opcao):
            $opcao->update(['resposta_opcao' => $opcoes[$i]]);
        endforeach;
    }

    private function aumentarOpcoes(Pergunta $pergunta, Array $opcoes)
    {
        $this->atualizarOpcoes($pergunta, array_slice($opcoes, 0, $pergunta->opcoesResposta->count()));
        $this->inserirOpcoes($pergunta, array_slice($opcoes, $pergunta->opcoesResposta->count()));
    }

    private function diminuirOpcoes(Pergunta $pergunta, Array $opcoes)
    {
        foreach ($opcoes as $i => $opcao):
            $pergunta->opcoesResposta->get($i)->update(['resposta_opcao' => $opcao]);
        endforeach;
        OpcaoResposta::destroy(array_slice($pergunta->opcoesResposta->toArray(), count($opcoes)));
    }
}
