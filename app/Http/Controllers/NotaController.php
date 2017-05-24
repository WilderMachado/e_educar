<?php

namespace eeducar\Http\Controllers;

use eeducar\Aluno;
use eeducar\Disciplina;
use eeducar\Http\Requests\NotaRequest;
use eeducar\Nota;
use eeducar\Professor;
use eeducar\Turma;
use eeducar\Unidade;
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
                $turma = Aluno::with('turma')->where('email', $user->email)->first()->turma;
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
        $disciplinas = collect();
        $user = Auth::user();
        switch ($user->role):
            case 'admin':
                $turmas = Turma::with('disciplinas')->get();
                $disciplinas = Disciplina::all();
                break;
            case 'professor':
                $professor = Professor::with('turmas', 'disciplinas')->where('email', $user->email)->first();
                $turmas = $professor->turmas;
                $disciplinas = $professor->disciplinas;
                break;
            case 'responsavel':
                foreach ($user->dependentes()->with('dependentes.turma.disciplinas')->get() as $dependente):
                    $turmas->push($dependente->turma);
                    foreach ($dependente->turma->disciplinas as $disciplina):
                        $disciplinas->push($disciplina);
                    endforeach;
                endforeach;
                break;
            case 'aluno':
                $turma = Aluno::with('turma')->where('email', $user->email)->first()->turma;
                return redirect()->route('disciplinas', ['turma_id' => $turma->id]);
                break;
            default:
                abort(403);
                break;
        endswitch;
        //dd($turmas);
        //$d = $disciplinas->intersect($turmas->get('disciplinas'));
        //dd($turmas->toArray(), $disciplinas->toArray(), $d->toArray());
        return view('nota.turmas', compact('turmas', 'disciplinas'));
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
                $disciplinas = Professor::with('turmas', 'disciplinas')->where('email', $user->email)->where('turmas.id', $turma_id)->first()->disciplinas;
                //$disciplinas = $turma->disciplinas->intersect(Professor::with('disciplinas')->where('email', $user->email)->disciplinas);
                break;
        endswitch;
        //dd($disciplinas, $turma);
        return view('nota.disciplinas', compact('disciplinas', 'turma'));
    }

    public function unidades($turma_id, $disciplina_id)
    {
        $turma = Turma::with('disciplinas', 'ano.unidades')->find($turma_id);
        $disciplina = Disciplina::find($disciplina_id);
        if (!$turma->disciplinas->contains($disciplina)):
            return redirect('notas');
        endif;
        $unidades = $turma->ano->unidades;
        return view('nota.unidades', compact('turma', 'disciplina', 'unidades'));
    }

    public function novo($turma_id, $disciplina_id, $unidade_id)
    {
        $turma = Turma::find($turma_id);
        //$alunos = Aluno::buscarPorTurma($turma_id)->get();
        $disciplina = Disciplina::find($disciplina_id);
        $unidade = Unidade::find($unidade_id);
        $alunos = $turma->alunos;
        return view('nota.novo', compact('turma', 'disciplina', 'unidade', 'alunos'));
    }

    public function salvar(NotaRequest $request)
    {
        $notas = $request->notas;
        foreach ($notas as $nota):
            Nota::create($nota);
        endforeach;
        return redirect('notas');
    }

    public function editar($turma_id, $disciplina_id, $unidade_id)
    {

    }
}