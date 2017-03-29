<?php

namespace eeducar\Http\Controllers;

use eeducar\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**Método que redireciona para página inicial de documentos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $documentos = Documento::paginate(config('constantes.paginacao'));  //Busca todos os documentos
        return view('documento.index', ['documentos' => $documentos]);     //Redireciona à página inicial de documentos
    }
}
