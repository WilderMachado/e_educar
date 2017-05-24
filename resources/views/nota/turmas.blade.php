@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class=" grey-text text-lighten-5">Notas</span>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Turma</th>
            <th>Disciplinas</th>
        </tr>
        </thead>
        <tbody>
        @foreach($turmas as $turma)
            <tr>
                <td>{{$turma->descricao}}</td>
                <td>
                    @foreach($turma->disciplinas->intersect($disciplinas) as $disciplina)
                        <a href="{{ route('notas.unidades', ['turma_id'=>$turma->id, 'disciplina_id'=>$disciplina->id]) }}">
                            {{$disciplina->nome}}
                        </a>
                        <br/>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection