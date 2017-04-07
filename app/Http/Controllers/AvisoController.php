<?php

namespace eeducar\Http\Controllers;

use eeducar\Aviso;
use eeducar\Http\Requests\AvisoRequest;
use eeducar\Turma;

class AvisoController extends Controller
{
    /**Método que redireciona para página inicial de avisos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->removerAntigos();                        //Evoca método para remover avisos antigos
        $avisos = Aviso::orderBy('id', 'desc')
            ->paginate(config('constantes.paginacao')); //Busca todos os avisos ordenando por id de forma decrescente
        return view('aviso.index', compact('avisos'));  //Redireciona para página inicial de avisos
    }

    public function novo()
    {
        $turmas = Turma::all('codigo', 'id');
        return view('aviso.novo', compact('turmas'));
    }

    public function salvar(AvisoRequest $request)
    {
        $aviso = Aviso::create($request->all());
        $aviso->turmas()->attach($request->turmas);
        return redirect('avisos');
    }

    public function editar($id)
    {
        $aviso = Aviso::with('turmas')->find($id);
        $turmas = Turma::all('codigo', 'id');
        return view('aviso.editar', compact('aviso', 'turmas'));
    }

    public function alterar(AvisoRequest $request, $id)
    {
        $aviso = Aviso::find($id);
        $aviso->update($request->all());
        $aviso->turmas()->sync($request->turmas);
        return redirect('avisos');
    }

    public function excluir($id)
    {
        $aviso = Aviso::find($id);
        $aviso->turmas()->detach();
        $aviso->delete();
        return redirect('avisos');
    }

    private function removerAntigos()
    {
        $avisos = Aviso::antigos()->with('turmas')->get();
        foreach ($avisos as $aviso):
            $aviso->turmas()->detach();
            $aviso->delete();
        endforeach;

    }
}