@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Nova Pergunta</span>
        </div>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>'perguntas.salvar']) !!}
            <div class="form-group">
                {!! Form::label ('enunciado', 'Enunciado: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::textarea ('enunciado', null, ['class'=>'form-control','maxlength'=>'255']) !!}
                </div>
            </div>
            <div class="col-xs-offset-2 col-xs-10">
                {!! Form::checkbox ('pergunta_fechada', true, false,['id'=>'cbx-fechada']) !!}
                {!! Form::label ('cbx-fechada', 'Fechada') !!}
            </div>
            <div id="oculta">
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        {!! Form::button ('Adicionar Opção', ['id'=>'btn-adicionar','class'=>'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    {!! Form::submit ('Salvar', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    {!! Html::script('js/pergunta.js') !!}
@endsection