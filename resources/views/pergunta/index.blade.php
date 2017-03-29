@extends('layouts.app')
@section('content')

    <div class="category">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Perguntas</span>
        </div>
        <table class="highlight  responsive-table">
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
                        <a class="btn-floating blue tooltipped" data-tooltip="Editar"
                           href="{{ route('perguntas.editar', ['id'=>$pergunta->id]) }}">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        @endcan
                        @can('excluir', eeducar\Pergunta::class)
                        <a class="btn-floating red btn-excluir  tooltipped" data-tooltip="Excluir"
                           href="{{ route('perguntas.excluir', ['id'=>$pergunta->id]) }}">
                            <i class="material-icons">delete</i>
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            {!! $perguntas->render() !!}
        </table>
        <br/>
        <br/>
        @can('salvar', eeducar\Pergunta::class)
        <a href="{{ route('perguntas.novo')}}" class="btn btn-primary light-blue darken-3">Nova pergunta</a>
        @endcan
    </div>
    <!-- {!! Html::script('js/adsproject.js') !!} -->
@endsection
