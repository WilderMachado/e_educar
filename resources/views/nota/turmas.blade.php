@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class=" grey-text text-lighten-5">Notas</span>
    </div>

    <fieldset>
        <legend>Turmas</legend>
        @foreach($turmas as $turma)
            <a href="{{ route('notas.disciplinas', ['turma_id'=>$turma->id]) }}">
                {{$turma->descricao}}
            </a>
            <br/>
        @endforeach
    </fieldset>
@endsection