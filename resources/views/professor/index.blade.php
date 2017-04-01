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
                        <a class="btn-floating grey darken-3 tooltipped" data-tooltip="Curriculo" target="_blank"
                           href="{{ $professor->curriculo }}">
                            <i class="material-icons">description</i>
                        </a>
                @endif
                <td>
                    @can('alterar', eeducar\Professor::class)
                    <a class="btn-floating blue tooltipped" data-tooltip="Editar"
                       href="{{ route('professores.editar', ['id'=>$professor->id]) }}">
                        <i class="material-icons">mode_edit</i>
                    </a>
                    @endcan
                    @can('excluir', eeducar\Professor::class)
                    <a class="btn-floating red btn-excluir tooltipped" data-tooltip="Excluir"
                       href="{{ route('professores.excluir', ['id'=>$professor->id]) }}">
                        <i class="material-icons">delete</i>
                    </a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
        {!! $professores->render() !!}
    </table>
    <br/>
    <br/>
    @can('salvar', eeducar\Professor::class)
    <a href="{{ route('professores.novo')}}" class="btn btn-primary light-blue darken-3"> Novo professor</a>
    @endcan
@endsection