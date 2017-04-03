<?php

namespace eeducar\Http\Controllers;

use eeducar\Disciplina;
use eeducar\Http\Requests\DisciplinaRequest;

class DisciplinaController extends Controller
{
    /**Método que redireciona para página inicial de disciplinas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $disciplinas = Disciplina::orderBy('nome')
            ->paginate(config('constantes.paginacao'));             //Busca disciplinas em ordem alfabética e pagina
        return view('disciplina.index', compact('disciplinas'));    //Redireciona à página inicial de disciplinas
    }

    public function novo()
    {
        return view('disciplina.novo');
    }

    public function salvar(DisciplinaRequest $request)
    {
        $this->validate($request,
            ['codigo' => 'unique:disciplinas,codigo']);
        Disciplina::create($request->all());
        return redirect('disciplinas');
    }

    public function editar($id)
    {
        $disciplina = Disciplina::find($id);
        return view('disciplina.editar',compact('disciplina'));
    }

    public function alterar(DisciplinaRequest $request, $id)
    {
        $this->validate($request,
            ['codigo' => 'unique:disciplinas,codigo,' . $id]);
        Disciplina::find($id)->update($request->all());
        return redirect('disciplinas');
    }

    public function excluir($id)
    {
        Disciplina::find($id)->delete();
        return redirect('disciplinas');
    }
}
