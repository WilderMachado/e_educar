@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class=" grey-text text-lighten-5">Turmas</span>
    </div>
    <table class="table">

        <thead>
        <tr>
            <th>Código</th>
            <th>Ano</th>
            <th>Turno</th>
            @can('acao', eeducar\Turma::class)
            <th>Ação</th>
            @endcan
        </tr>
        </thead>

        <tbody>
        @foreach($turmas as $turma)
            <tr>
                <td>{{$turma->codigo}}</td>
                <td>{{$turma->ano->codigo}}</td>
                <td>{{$turma->turno}}</td>
                <td>
                    @can('alterar', eeducar\Turma::class)
                    <a title="Editar"
                       href="{{ route('turmas.editar', ['id'=>$turma->id]) }}">
                        <em class="glyphicon glyphicon-edit"></em>
                    </a>
                    @endcan
                    @can('excluir', $turma)
                    <a class="btn-excluir" title="Excluir"
                       href="{{ route('turmas.excluir', ['id'=>$turma->id]) }}">
                        <em class="glyphicon glyphicon-trash"></em>
                    </a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
        {!! $turmas->render() !!}
    </table>
    @can('salvar', eeducar\Turma::class)
    <a href="{{ route('turmas.novo')}}" class="btn btn-primary"> Nova Turma</a>
    @endcan
    {!! Html::script('js/index.js') !!}
@endsection