@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Editar Avaliação</span>
        </div>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>['avaliacoes.alterar', $avaliacao->id], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label ('ano_id', 'Ano: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::select ('ano_id', $anos, $avaliacao->ano_id, ['class'=>'form-control','placeholder'=>'']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('inicio', 'Início: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::date ('inicio', $avaliacao->inicio, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('termino', 'Término: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::date ('termino', $avaliacao->termino, ['class'=>'form-control']) !!}
                </div>
            </div>
            <fieldset>
                <ul>
                    <legend>Perguntas</legend>
                    @foreach($perguntas as $pergunta)
                        {!! Form::checkbox ('perguntas[]',$pergunta->id, $avaliacao->perguntas->contains($pergunta), ['id'=>$pergunta->id]) !!}
                        {!! Form::label ($pergunta->id, $pergunta->enunciado) !!}
                        <br/>
                    @endforeach
                    <a href="{{ route('perguntas.novo')}}" class="btn btn-primary"> Nova Pergunta</a>
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