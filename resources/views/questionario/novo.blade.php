@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Questionário de Avaliação {{$avaliacao->ano->codigo}}</span>
        </div>
        @include('errors.alert')
        <div class="form-group">
            {!! Form::open(['route'=>'questionarios.salvar']) !!}
            {!! Form::hidden ('avaliacao_id', $avaliacao->id) !!}
            {!! Form::hidden ('responsavel_id', $responsavel_id) !!}
            <div class="form-group col-xs-offset-1">
                <ol>
                    @foreach($avaliacao->perguntas as $pergunta)
                        <li>
                            {!! Form::label ('enunciado', $pergunta->enunciado) !!}
                            <input name="pergunta_id[]" type="hidden" value="{{$pergunta->id}}">
                            @if($pergunta->pergunta_fechada)
                                @foreach($pergunta->opcoesResposta as $opcao)
                                    <br/>
                                    <input type="radio" name="campo_resposta[]" id="{{$opcao->id}}"
                                           value="{{$opcao->resposta_opcao}}"/>
                                    <label for="{{$opcao->id}}">{{$opcao->resposta_opcao}}</label>
                                @endforeach
                            @else
                                <input type="text" name="campo_resposta[]" class="form-control" maxlength="255"/>
                            @endif
                        </li>
                    @endforeach
                </ol>
                {!! Form::submit ('Salvar', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection