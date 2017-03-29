@extends('layouts.app')
@section('content')
    <div class="category">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Alunos</span>
        </div>
        <table class="highlight  responsive-table">

            <thead>
            <tr>
                <th>Matr�cula</th>
                <th>Nome</th>
                <th>Turma</th>
                <th>email</th>
                @can('acao', eeducar\Aluno::class)
                <th>A��o</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($alunos as $aluno)

                <tr>
                    <td>{{$aluno->matricula}}</td>
                    <td>{{$aluno->nome}}</td>
                    <td>{{$aluno->turma->codigo}}</td>
                    <td>
                    @if($aluno->email !=null && $aluno->email != '' )
                        {{ $aluno->email }}
                    @endif
                    <td>
                        @can('alterar', $aluno)
                        <a class="btn-floating blue tooltipped" data-tooltip="Editar"
                           href="{{ route('alunos.editar', ['id'=>$aluno->id]) }}">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        @endcan
                        @can('excluir', $aluno)
                        <a class="btn-floating red btn-excluir"
                           href="{{ route('alunos.excluir', ['id'=>$aluno->id]) }}" >
                            <i class="material-icons">delete</i>
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            {!! $alunos->render() !!}
        </table>
        <br/>
        <br/>
        @can('salvar', new Aluno())
        <a href="{{ route('alunos.novo')}}" class="btn btn-primary light-blue darken-3">Novo Aluno</a>
        @endcan
        <br/> <br/>
        @can('carregar', new Aluno())
        <a href="{{ route('alunos.arquivo')}}" class="btn btn-primary light-blue darken-3">Arquivo de Alunos</a>
        @endcan
    </div>
@endsection