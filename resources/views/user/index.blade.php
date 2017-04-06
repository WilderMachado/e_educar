@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class=" grey-text text-lighten-5">Usuários</span>
    </div>
    <table class="highlight  responsive-table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Papel</th>
            @can('acao', eeducar\User::class)
            <th>Ação</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    @can('alterar', eeducar\User::class)
                    <a title="Editar"
                       href="{{ route('users.editar', ['id'=>$user->id]) }}">
                        <em class="glyphicon glyphicon-edit"></em>
                    </a>
                    @endcan
                    @can('excluir', eeducar\User::class)
                    <a class="btn-excluir" title="Excluir"
                       href="{{ route('users.excluir', ['id'=>$user->id]) }}">
                        <em class="glyphicon glyphicon-trash"></em>
                    </a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
        {!! $users->render() !!}
    </table>
    @can('salvar', eeducar\User::class)
    <a href="{{ route('users.novo')}}" class="btn btn-primary"> Novo usuário</a>
    @endcan
    {!! Html::script('js/index.js') !!}
@endsection
