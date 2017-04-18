<?php

namespace eeducar\Http\Controllers;

use eeducar\Avaliacao;
use eeducar\Http\Requests\QuestionarioRequest;
use Illuminate\Support\Facades\Auth;

class QuestionarioController extends Controller
{
    public function novo()
    {
        $user = Auth::user();
        if ($user->role != 'responsavel'):
            abort(403);
        endif;
        $avaliacao = $avaliacao = Avaliacao::aberta()->first();
        if (is_null($avaliacao)):
            $this->mensagem('Não há avaliação disponível no momento.', back()->getTargetUrl());
            return;
        endif;
        $responsavel_id = $user->id;
        return view('questionario.novo', compact('avaliacao', 'responsavel_id'));
    }

    public function salvar(QuestionarioRequest $request)
    {
        $avaliacao = Avaliacao::find($request->avaliacao_id);
        $perguntas = $request->pergunta_id;
        $respostas = $request->campo_resposta;
        $responsavel = $request->responsavel_id;
        foreach ($respostas as $i => $resposta):
            $avaliacao->respostas()->create([
                'campo_resposta' => $resposta,
                'pergunta_id'=>$perguntas[$i],
            ]);
        endforeach;
        $avaliacao->responsaveis()->attach($responsavel);
        return redirect('home');
    }

    private function mensagem($texto, $rota)
    {
        $texto = utf8_encode($texto);
        echo "<script>
                alert('$texto');
                window.location='$rota';
                </script>";
    }
}
