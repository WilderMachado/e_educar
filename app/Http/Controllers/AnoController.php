<?php

namespace eeducar\Http\Controllers;

use eeducar\Ano;
use eeducar\Http\Requests\AnoRequest;

class AnoController extends Controller
{
    /**Método que redireciona para página inicial de anos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $anos = Ano::paginate(config('constantes.paginacao'));  //Busca todos os anos
        return view('ano.index', compact('anos'));              //Redireciona à página inicial de anos
    }

    public function novo()
    {
        return view('ano.novo');
    }


    public function salvar(AnoRequest $request)
    {
        $this->validate($request,
            ['codigo' => 'unique:anos,codigo']);
        Ano::create($request->all());
        return redirect('anos');
    }

    public function editar($id)
    {
        $ano = Ano::find($id);
        return view('ano.editar', compact('ano'));
    }

    public function alterar(AnoRequest $request, $id)
    {
        $this->validate($request,
            ['codigo' => 'unique:anos,codigo,' . $id]);
        Ano::find($id)->update($request->all());
        return redirect('anos');
    }

    /*public function excluir($id)
    {
        Ano::find($id)->delete();
        return redirect('anos');
    }*/
}
