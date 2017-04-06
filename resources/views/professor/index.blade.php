@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class=" grey-text text-lighten-5">Professores</span>
    </div>
    <table class="table">

        <thead>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Curriculo</th>
            @can('acao', eeducar\Professor::class)
            <th>Ação</th>
            @endcan
        </tr>
        </thead>

        <tbody>
        @foreach($professores as $professor)
            <tr>
                <td>{{$professor->matricula}}</td>
                <td>{{$professor->nome}}</td>
                <td>
                    @if($professor->curriculo !=null && $professor->curriculo != '' )
                        <a title="Currículo" target="_blank"
                           href="{{ $professor->curriculo }}">
                            <em class="glyphicon glyphicon-eye-open" aria-hidden="true"></em>
                        </a>
                @endif
                <td>
                    @can('alterar',eeducar\Professor::class)
                    <a title="Editar"
                       href="{{ route('professores.editar', ['id'=>$professor->id]) }}">
                        <em class="glyphicon glyphicon-edit"></em>
                    </a>
                    @endcan
                    @can('excluir',eeducar\Professor::class)
                    <a class="btn-excluir" title="Excluir"
                       href="{{ route('professores.excluir', ['id'=>$professor->id]) }}">
                        <em class="glyphicon glyphicon-trash"></em>
                    </a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
        {!! $professores->render() !!}
    </table>
    @can('salvar', eeducar\Professor::class)
    <a href="{{ route('professores.novo')}}" class="btn btn-primary"> Novo professor</a>
    @endcan
    {!! Html::script('js/index.js') !!}
@endsection