@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Novo Ano</span>
        </div>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>'anos.salvar']) !!}
            <div class="form-group">
                {!! Form::label ('codigo', 'Código: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::text ('codigo', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('inicio', 'Início: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::date ('inicio', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('termino', 'Término: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::date ('termino', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <fieldset>
                <legend>Unidades</legend>
            <div id="unidades">
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        {!! Form::button ('Adicionar Unidade', ['id'=>'btn-adicionar','class'=>'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            </fieldset>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    {!! Form::submit ('Salvar', ['class'=>'btn btn-primary light-blue darken-3']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    {!! Html::script('js/ano.js') !!}
@endsection