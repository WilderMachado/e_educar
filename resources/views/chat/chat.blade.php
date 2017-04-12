@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Chat</span>
        </div>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>'chats.salvar']) !!}
            @if($destinatario_id)
                {!! Form::hidden ('destinatario_id', $destinatario_id, ['id'=>'destinatario_id']) !!}
            @endif
            <div class="form-group">
                {!! Form::label ('mensagem', 'Mensagem: ',['class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::textarea('mensagem', null, ['class'=>'form-control', 'maxlenght'=>'255']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    {!! Form::button ('Enviar', ['id'=>'btn-enviar','class'=>'btn btn-primary light-blue darken-3']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            <fieldset>
                <legend>Mensagens</legend>
                <ul id="mensagens">
                    @foreach($chats as $chat)
                        <li id="{{'chat_'.$chat->id}}">
                            {{$chat->name.' '.date('d/m/Y H:i:s', strtotime($chat->data_hora))}}
                            <br/>
                            {{$chat->mensagem}}
                        </li>
                    @endforeach
                </ul>
            </fieldset>

        </div>
    </div>
    {!! Html::script('js/chat.js') !!}
@endsection