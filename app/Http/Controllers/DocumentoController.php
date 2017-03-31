<?php

namespace eeducar\Http\Controllers;

use eeducar\Documento;
use eeducar\Http\Requests\DocumentoRequest;

class DocumentoController extends Controller
{
    /**Método que redireciona para página inicial de documentos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $documentos = Documento::paginate(config('constantes.paginacao'));  //Busca todos os documentos
        return view('documento.index', compact('documentos'));              //Redireciona à página inicial de documentos
    }

    public function novo()
    {
        return view('documento.novo');
    }

    public function salvar()
    {

    }

    public function editar($id)
    {

    }

    public function alterar(DocumentoRequest $request, $id)
    {

    }

    public function excluir($id)
    {

    }
}
