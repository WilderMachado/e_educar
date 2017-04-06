@extends('layouts.app')
@section('content')
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Alunos</span>
        </div>
        <table class="table">

            <thead>
            <tr>
                <th>Foto</th>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Turma</th>
                <th>email</th>
                @can('acao', eeducar\Aluno::class)
                <th>Ação</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($alunos as $aluno)

                <tr>
                    <td align="center">{{Html::image($aluno->foto,$aluno->nome,
                                    array('class'=>'img-rounded','width' => 70, 'height' => 70 ))}}</td>
                    <td>{{$aluno->matricula}}</td>
                    <td>{{$aluno->nome}}</td>
                    <td>{{$aluno->turma->codigo}}</td>
                    <td>
                    @if($aluno->email !=null && $aluno->email != '' )
                        {{ $aluno->email }}
                    @endif
                    <td>
                        @can('alterar', eeducar\Aluno::class)
                        <a title="Editar"
                           href="{{ route('alunos.editar', ['id'=>$aluno->id]) }}">
                            <em class="glyphicon glyphicon-edit"></em>
                        </a>
                        @endcan

                        @can('excluir', eeducar\Aluno::class)
                        <a class="btn-excluir" title="Excluir"
                           href="{{ route('alunos.excluir', ['id'=>$aluno->id]) }}">
                            <em class="glyphicon glyphicon-trash"></em>
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            {!! $alunos->render() !!}
        </table>
        @can('salvar', eeducar\Aluno::class)
        <a href="{{ route('alunos.novo')}}" class="btn btn-primary">Novo Aluno</a>
        @endcan
        {!! Html::script('js/index.js') !!}
@endsection