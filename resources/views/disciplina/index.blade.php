@extends('layouts.app')
@section('content')
    <div class="category">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Disciplinas </span>

        </div>
        <table class="highlight  responsive-table">
            <thead>
            <tr>
                <th>C�digo</th>
                <th>Nome</th>
                <th>Carga hor�ria</th>
                @can('acao', eeducar\Disciplina::class)
                <th>A��o</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($disciplinas as $disciplina)
                <tr>
                    <td>{{$disciplina->codigo}}</td>
                    <td>{{$disciplina->nome}}</td>
                    <td>{{$disciplina->carga_horaria}}</td>

                    <td>
                        @can('alterar', eeducar\Disciplina::class)
                        <a class="btn-floating blue tooltipped" data-tooltip="Editar"
                           href="{{ route('disciplinas.editar', ['id'=>$disciplina->id]) }}">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        @endcan
                        @can('excluir', eeducar\Disciplina::class)
                        <a class="btn-floating red btn-excluir tooltipped" data-tooltip="Excluir"
                           href="{{ route('disciplinas.excluir', ['id'=>$disciplina->id]) }}">
                            <i class="material-icons">delete</i>
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            {!! $disciplinas->render() !!}
        </table>
        <br/>
        <br/>
        @can('salvar', eeducar\Disciplina::class)
        <a href="{{ route('disciplinas.novo')}}" class="btn btn-primary light-blue darken-3"> Nova disciplina</a>
        @endcan
    </div>
   <!-- {!! Html::script('js/adsproject.js') !!} -->
@endsection