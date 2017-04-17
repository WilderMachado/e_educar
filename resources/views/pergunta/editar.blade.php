@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Editar Pergunta</span>
        </div>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>['perguntas.alterar',$pergunta->id],'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label ('enunciado', 'Enunciado: ',['class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::textarea ('enunciado', $pergunta->enunciado, ['class'=>'form-control','maxlength'=>'255']) !!}
                </div>
            </div>
            <div class="col-xs-offset-2 col-xs-10">
                {!! Form::checkbox ('pergunta_fechada', true, $pergunta->pergunta_fechada,['id'=>'cbx-fechada']) !!}
                {!! Form::label ('cbx-fechada', 'Fechada') !!}
            </div>
            <div id="oculta">
                @if($pergunta->pergunta_fechada)
                    @foreach($pergunta->opcoesResposta as $opcao)
                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-5">
                                <input type="text" name="opcoes_resposta[]" class="form-control" maxlength="255" value="{{$opcao->resposta_opcao}}"/>
                                {!! Form::button('Remover', ['class'=>'btn-remover btn btn-primary']) !!}
                            </div>
                        </div>
                    @endforeach
                @endif
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