@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class=" grey-text text-lighten-5">Notas</span>
    </div>
    <h4>Turma: {{$turma->descricao}}</h4>
    <h4>Disciplina: {{$disciplina->nome}}</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Unidade</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($unidades as $unidade)
            <tr>
                <td>{{$unidade->codigo}}</td>
                <td>
                    <a title="Nova nota"
                       href="{{ route('notas.novo', ['turma_id'=>$turma->id,'disciplina_id'=>$disciplina->id, 'unidade_id'=>$unidade->id]) }}">
                        <em class="glyphicon glyphicon-plus-sign"></em>
                    </a>
                    <a title="Editar nota"
                       href="{{ route('notas.editar', ['turma_id'=>$turma->id,'disciplina_id'=>$disciplina->id, 'unidade_id'=>$unidade->id]) }}">
                        <em class="glyphicon glyphicon-edit"></em>
                    </a>

                </td>
        @endforeach
        </tbody>
    </table>
@endsection