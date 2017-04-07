@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Novo Aviso</span>
        </div>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>'avisos.salvar']) !!}
            <div class="form-group">
                {!! Form::label ('titulo', 'Título: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::text ('titulo', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('mensagem', 'Mensagem: ',['class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::textarea('mensagem', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <fieldset>
                <ul>
                    <legend>Turmas</legend>
                    @foreach($turmas as $turma)
                        {!! Form::checkbox('turmas[]', $turma->id, false, ['id'=>$turma->id]) !!}
                        {!! Form::label($turma->id, $turma->codigo) !!}
                        <br/>
                    @endforeach
                </ul>
            </fieldset>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    {!! Form::submit ('Salvar', ['class'=>'btn btn-primary light-blue darken-3']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection