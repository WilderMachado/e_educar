@extends('layouts.app')
@section('content')
    <div class="category">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Turmas</span>
        </div>
        <table class="highlight  responsive-table">

            <thead>
            <tr>
                <th>C�digo</th>
                <th>Ano</th>
                <th>Turno</th>
                @can('acao', eeducar\Turma::class)
                <th>A��o</th>
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
                        <a class="btn-floating blue tooltipped" data-tooltip="Editar"
                           href="{{ route('turmas.editar', ['id'=>$turma->id]) }}">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        @endcan
                        @can('excluir', eeducar\Turma::class)
                        <a class="btn-floating red btn-excluir tooltipped" data-tooltip="Excluir"
                           href="{{ route('turmas.excluir', ['id'=>$turma->id]) }}">
                            <i class="material-icons">delete</i>
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            {!! $turmas->render() !!}
        </table>
        <br/>
        <br/>
        @can('salvar', eeducar\Turma::class)
        <a href="{{ route('turmas.novo')}}" class="btn btn-primary light-blue darken-3"> Nova Turma</a>
        @endcan
    </div>
    <!-- {!! Html::script('js/adsproject.js') !!} -->
@endsection