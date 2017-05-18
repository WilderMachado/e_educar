<?php

namespace eeducar\Http\Controllers;

use eeducar\Aluno;
use eeducar\Http\Requests\NotaRequest;
use eeducar\Professor;
use eeducar\Turma;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
    public function index()
    {
        //$turmas = collect();
        $user = Auth::user();
        switch ($user->role):
            case 'admin':
            case 'professor':
            case 'responsavel':
                return redirect()->route('notas.turmas');
                break;
            case 'aluno':
                $turma = Aluno::with('turma')->where('email', $user->email)->turma;
                return redirect()->route('disciplinas', ['turma_id' => $turma->id]);
                break;
            default:
                abort(403);
                break;
        endswitch;
        //return view('nota.index', compact('turmas'));
    }

    public function turmas()
    {
        $turmas = collect();
        $user = Auth::user();
        switch ($user->role):
            case 'admin':
                $turmas = Turma::all();
                break;
            case 'professor':
                $turmas = Professor::with('turmas')->where('email', $user->email)->turmas;
                break;
            case 'responsavel':
                foreach ($user->dependentes()->with('dependentes.turma')->get() as $dependente):
                    $turmas->push($dependente->turma);
                endforeach;
                break;
            case 'aluno':
                $turma = Aluno::with('turma')->where('email', $user->email)->turma;
                return redirect()->route('disciplinas', ['turma_id' => $turma->id]);
                break;
            default:
                abort(403);
                break;
        endswitch;
        return view('nota.turmas', compact('turmas'));
    }

    public function disciplinas($turma_id)
    {
        $turma = Turma::with('disciplinas', 'ano.unidades')->find($turma_id);
        $disciplinas = null;
        $user = Auth::user();
        switch ($user->role):
            case 'admin':
            case 'responsavel':
            case 'aluno':
                $disciplinas = $turma->disciplinas;
                break;
            case 'professor':
                $disciplinas = Professor::with('turmas', 'disciplinas')->where('email', $user->email)->where('turmas.id', $turma_id)->disciplinas;
                //$disciplinas = $turma->disciplinas->intersect(Professor::with('disciplinas')->where('email', $user->email)->disciplinas);
                break;
        endswitch;
        //dd($disciplinas, $turma);
        return view('nota.disciplinas', compact('disciplinas', 'turma'));
    }

    public function novo($turma_id, $disciplina_id, $unidade_id)
    {
        //dd($turma_id, $disciplina_id, $unidade_id);
        //Buscar alunos por turma
        $alunos = Aluno::buscarPorTurma($turma_id)->get();
        return view('nota.novo', compact('turma_id', 'disciplina_id', 'unidade_id', 'alunos'));
    }

    public function salvar(NotaRequest $request)
    {
dd($request->all());
    }
}