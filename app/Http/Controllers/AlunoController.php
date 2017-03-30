<?php

namespace eeducar\Http\Controllers;

use eeducar\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Método que redireciona para página inicial de alunos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome')
            ->paginate(config('constantes.paginacao'));     //busca relação de alunos em ordem alfabética utilizando páginação
        return view('aluno.index', ['alunos' => $alunos]);  //Redireciona para a view com os alunos
    }
}
