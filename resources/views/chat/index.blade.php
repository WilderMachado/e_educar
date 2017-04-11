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
                    @can('alterar', eeducar\Chat::class)
                    <a title="Entrar"
                       href="{{ route('chats.entrar', ['id'=>$user->id]) }}">
                        <em class="glyphicon glyphicon-comment icon-conversation"></em>
                    </a>
                    @endcan
                    @can('excluir', eeducar\Disciplina::class)
                    <a class="btn-excluir" title="Excluir"
                       href="{{ route('chats.excluir', ['id'=>$user->id]) }}">
                        <em class="glyphicon glyphicon-trash"></em>
                    </a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
        {!! $disciplinas->render() !!}
    </table>
    @can('salvar', eeducar\Disciplina::class)
    <a href="{{ route('disciplinas.novo')}}" class="btn btn-primary"> Nova disciplina</a>
    @endcan
    {!! Html::script('js/index.js') !!}
@endsection
