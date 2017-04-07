<?php

namespace eeducar\Http\Controllers;

use eeducar\Documento;
use eeducar\Http\ManipuladorArquivo;
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

    public function salvar(DocumentoRequest $request)
    {
        $this->validate($request,
            ['arquivo' => 'required']);
        $documento = new Documento($request->all());
        $documento->url = ManipuladorArquivo::salvar($request->file('arquivo'), 'documentos', $documento->titulo);
        $documento->save();
        return redirect('documentos');
    }

    public function editar($id)
    {
        $documento = Documento::find($id);
        return view('documento.editar', compact('documento'));
    }

    public function alterar(DocumentoRequest $request, $id)
    {
        $documento = Documento::find($id);
        $documento->fill($request->all());
        $url = ManipuladorArquivo::salvar($request->file('arquivo'), 'documentos', $documento->titulo);
        if ($url != null && $url != $documento->url):
            ManipuladorArquivo::excluir($documento->url);
            $documento->url = $url;
        endif;
        $documento->save();
        return redirect('documentos');
    }

    public function excluir($id)
    {
        $documento = Documento::find($id);
        ManipuladorArquivo::excluir($documento->url);
        $documento->url = '';
        $documento->save();
        $documento->delete();
        return redirect('documentos');
    }
}
