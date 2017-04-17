<?php

namespace eeducar\Http\Controllers;

use eeducar\Avaliacao;
use Illuminate\Http\Request;
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

    private function mensagem($texto, $rota)
    {
        $texto = utf8_encode($texto);
        echo "<script>
                alert('$texto');
                window.location='$rota';
                </script>";
    }
}
