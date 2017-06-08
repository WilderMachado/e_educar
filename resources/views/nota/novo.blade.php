@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Nova Nota</span>
        </div>
        <h4>Turma: {{$turma->descricao}}</h4>
        <h4>Disciplina: {{$disciplina->nome}}</h4>
        <h4>Unidade: {{$unidade->codigo}}</h4>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>['notas.salvar',$turma->id,$disciplina->id,$unidade->id]]) !!}
            @foreach($alunos as $indice => $aluno)
                <div class="form-group">
                    {!! Form::label ('aluno', $aluno->nome,[ 'class'=>'control-label col-xs-2']) !!}
                    <div class="col-xs-1">
                        {!! Form::hidden ("notas[$indice][aluno_id]", $aluno->id) !!}
                        {!! Form::text ("notas[$indice][valor]", null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            @endforeach
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    {!! Form::submit ('Salvar', ['class'=>'btn btn-primary light-blue darken-3']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection