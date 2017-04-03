<?php

namespace eeducar\Http\Controllers;

use eeducar\Http\Requests\ProfessorRequest;
use eeducar\Professor;

class ProfessorController extends Controller
{
    /**Método que redireciona para página inicial de professores
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $professores = Professor::orderBy('nome')
            ->paginate(config('constantes.paginacao'));             //Busca professores ordenando por nome
        return view('professor.index',  compact('professores'));    //Redireciona à página inicial de professores
    }

    public function novo()
    {
        return view('professor.novo');
    }

    public function salvar(ProfessorRequest $request)
    {
        $this->validate($request,[
            'matricula' => 'unique:professors,matricula',
            'email'=>'unique:professors,email'
        ]);                                                                 //Valida matrícula e e-mail do professor
        Professor::create($request->all());                                 //Cria novo professor
        return redirect('professores');                                     //Redireciona para página inicial de professores
    }

    public function editar($id)
    {
        $professor = Professor::find($id);
        return view('professor.editar',compact('professor'));
    }

    public function alterar(ProfessorRequest $request, $id)
    {
        Professor::find($id)->update($request->all());
        return redirect('professores');
    }

    public function excluir($id)
    {
        Professor::find($id)->delete();
        return redirect('professores');
    }
}
