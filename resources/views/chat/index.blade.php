@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class="grey-text text-lighten-5">Chats</span>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Usuário</th>
            @can('acao', eeducar\Chat::class)
            <th>Ação</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>
                    @can('salvar', eeducar\Chat::class)
                    <a title="Entrar"
                       href="{{ route('chats.chat', ['user_id'=>$user->id]) }}">
                        <em class="glyphicon glyphicon-comment"></em>
                    </a>
                    @endcan
                    @can('excluir', eeducar\Chat::class)
                    <a class="btn-excluir" title="Excluir"
                       href="{{ route('chats.excluir', ['id'=>$user->id]) }}">
                        <em class="glyphicon glyphicon-trash"></em>
                    </a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
        {!! $users->render() !!}
    </table>
    {!! Html::script('js/index.js') !!}
@endsection
