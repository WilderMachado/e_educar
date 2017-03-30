<?php

namespace eeducar\Http\Controllers;

use eeducar\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * M�todo que redireciona para p�gina inicial de alunos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome')
            ->paginate(config('constantes.paginacao'));     //busca rela��o de alunos em ordem alfab�tica utilizando p�gina��o
        return view('aluno.index', ['alunos' => $alunos]);  //Redireciona para a view com os alunos
    }
}
