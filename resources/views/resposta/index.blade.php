@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class=" grey-text text-lighten-5">Respostas</span>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>
            <th>Disciplina</th>
            <th>Ano</th>
        </tr>
        </thead>
        <tbody>
        @foreach($respostas as $resposta)
            <tr>
                <td>{{$resposta->pergunta->enunciado}}</td>
                <td>{{$resposta->campo_resposta}}</td>
                <td>{{$resposta->disciplina->nome}}</td>
                <td>{{$resposta->avaliacao->ano->codigo}}</td>
            </tr>
        @endforeach
        </tbody>
        {!! $respostas->render() !!}
    </table>
@endsection