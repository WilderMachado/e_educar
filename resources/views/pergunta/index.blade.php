@extends('layouts.app')
@section('content')
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Perguntas</span>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Enunciado</th>
                @can('acao', eeducar\Pergunta::class)
                <th>Ação</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($perguntas as $pergunta)
                <tr>
                    <td>{{$pergunta->enunciado}}</td>
                    <td>
                        @can('alterar', eeducar\Pergunta::class)
                        <a title="Editar"
                           href="{{ route('perguntas.editar', ['id'=>$pergunta->id]) }}">
                            <em class="glyphicon glyphicon-edit"></em>
                        </a>
                        @endcan
                        @can('excluir', eeducar\Pergunta::class)
                        <a class="btn-excluir" title="Excluir"
                           href="{{ route('perguntas.excluir', ['id'=>$pergunta->id]) }}">
                            <em class="glyphicon glyphicon-trash"></em>
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            {!! $perguntas->render() !!}
        </table>
        @can('salvar', eeducar\Pergunta::class)
        <a href="{{ route('perguntas.novo')}}" class="btn btn-primary">Nova pergunta</a>
        @endcan
        {!! Html::script('js/index.js') !!}
@endsection
