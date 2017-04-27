<?php

namespace eeducar\Http\Controllers;

use eeducar\Ano;
use eeducar\Http\Requests\AnoRequest;
use eeducar\Unidade;

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
        $ano = Ano::create($request->all());
        $ano->unidades()->createMany($request->unidades);
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
        $ano = Ano::with('unidades')->find($id);
        $unidades = array_values($request->unidades);
        if (count($unidades) == $ano->unidades->count()):
            $this->atualizarUnidades($ano, $unidades);
        elseif (count($unidades) > $ano->unidades->count()):
            $this->aumentarUnidades($ano, $unidades);
        else:
            $this->diminuirUnidades($ano, $unidades);
        endif;
        $ano->update($request->all());
        return redirect('anos');
    }

    /*public function excluir($id)
    {
        Ano::find($id)->delete();
        return redirect('anos');
    }*/

    private function atualizarUnidades(Ano $ano, $unidades)
    {
        foreach ($ano->unidades as $i => $unidade):
            $unidade->update($unidades[$i]);
        endforeach;
    }

    private function aumentarUnidades(Ano $ano, $unidades)
    {
        $this->atualizarUnidades($ano, array_slice($unidades, 0, $ano->unidades->count()));
        $ano->unidades()->createMany(array_slice($unidades, $ano->unidades->count()));
    }

    private function diminuirUnidades(Ano $ano, $unidades)
    {
        foreach ($unidades as $i => $unidade):
            $ano->unidades->get($i)->update($unidade);
        endforeach;
        Unidade::destroy(array_slice($ano->unidades->toArray(), count($unidades)));
    }
}