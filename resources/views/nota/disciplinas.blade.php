@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class=" grey-text text-lighten-5">Notas</span>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Disciplina</th>
            <th>Unidades</th>
        </tr>
        </thead>
        <tbody>
        @foreach($disciplinas as $disciplina)
            <tr>
                <td>{{$disciplina->nome}}</td>
                <td>
                    @foreach($turma->ano->unidades as $unidade)
                        {{$unidade->codigo}}
                        <a title="Nova nota"
                           href="{{ route('notas.novo', ['turma_id'=>$turma->id,'disciplina_id'=>$disciplina->id, 'unidade_id'=>$unidade->id]) }}">
                            <em class="glyphicon glyphicon-plus-sign"></em>
                        </a>
                        <a title="Editar nota"
                           href="{{ route('notas.editar', ['turma_id'=>$turma->id,'disciplina_id'=>$disciplina->id, 'unidade_id'=>$unidade->id]) }}">
                            <em class="glyphicon glyphicon-edit"></em>
                        </a>
                        <br />
                    @endforeach
                </td>
        @endforeach
        </tbody>
    </table>
    {!! Html::script('js/index.js') !!}
@endsection