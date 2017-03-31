<?php

namespace eeducar\Http\Controllers;

use eeducar\Aviso;
use eeducar\Http\Requests\AvisoRequest;

class AvisoController extends Controller
{
    /**Método que redireciona para página inicial de avisos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //$this->removerAntigos();                      //Evoca método para remover avisos antigos
        $avisos = Aviso::orderBy('id', 'desc')
            ->paginate(config('constantes.paginacao')); //Busca todos os avisos ordenando por id de forma decrescente
        return view('aviso.index', compact('avisos'));  //Redireciona para página inicial de avisos
    }

    public function novo()
    {
        return view('aviso.novo');
    }

    public function salvar()
    {

    }

    public function editar($id)
    {

    }

    public function alterar(AvisoRequest $request, $id)
    {

    }

    public function excluir($id)
    {

    }
}
