@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Editar Ano</span>
        </div>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>['anos.alterar', $ano->id], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label ('codigo', 'Código: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::text ('codigo', $ano->codigo, ['class'=>'form-control','maxlength'=>'6']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('inicio', 'Início: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::date ('inicio', $ano->inicio, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('termino', 'Término: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::date ('termino', $ano->termino, ['class'=>'form-control']) !!}
                </div>
            </div>
            <fieldset>
                <legend>Unidades</legend>
                <div id="unidades">
                    @foreach($ano->unidades as $indice =>  $unidade)
                        <div class="unidade">
                            <div class="form-group">
                                {!! Form::label ("unidades[$indice][codigo]", 'Código: ',[ 'class'=>'control-label col-xs-2']) !!}
                                <div class="col-xs-5">
                                    {!! Form::text ("unidades[$indice][codigo]", $unidade->codigo, ['class'=>'form-control', 'maxlength'=>'6']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label ("unidades[$indice][inicio]", 'Início: ',[ 'class'=>'control-label col-xs-2']) !!}
                                <div class="col-xs-5">
                                    {!! Form::date ("unidades[$indice][inicio]", $unidade->inicio, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label ("unidades[$indice][termino]", 'Término: ',['class'=>'control-label col-xs-2']) !!}
                                <div class="col-xs-5">
                                    {!! Form::date ("unidades[$indice][termino]", $unidade->termino, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            {!! Form::button ('Remover', ['class'=>'btn-remover btn btn-primary col-xs-offset-2']) !!}
                            <hr/>
                        </div>
                    @endforeach
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