@extends('layouts.app')
@section('content')
        <div class="card-panel  #388e3c green darken-2 center">
            <span class="grey-text text-lighten-5">Disciplinas</span>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Carga horária</th>
                @can('acao', eeducar\Disciplina::class)
                <th>Ação</th>
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
                        <a title="Editar"
                           href="{{ route('disciplinas.editar', ['id'=>$disciplina->id]) }}">
                            <em class="glyphicon glyphicon-edit"></em>
                        </a>
                        @endcan
                        @can('excluir', eeducar\Disciplina::class)
                        <a class="btn-excluir" title="Excluir"
                           href="{{ route('disciplinas.excluir', ['id'=>$disciplina->id]) }}">
                            <em class="glyphicon glyphicon-trash"></em>
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
        <a href="{{ route('disciplinas.novo')}}" class="btn btn-primary"> Nova disciplina</a>
        @endcan
        {!! Html::script('js/index.js') !!}
@endsection