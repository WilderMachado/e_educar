@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class=" grey-text text-lighten-5">Notas</span>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Turma</th>
            <th>Unidades</th>
            @can('acao', eeducar\Nota::class)
            <th>Ação</th>
            @endcan
        </tr>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
                <tr>
                <td>{{$turma->codigo}}</td>
                <td>
                    @foreach($turma->ano->unidades as $unidade)
                        {{$unidade->codigo}}
                        <a title="Novo"
                           href="{{ route('notas.novo', ['id'=>$unidade->id]) }}">
                            <em class="glyphicon glyphicon-new-window"></em>
                        </a>
                        <a title="Editar"
                           href="{{ route('documentos.editar', ['id'=>$documento->id]) }}">
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