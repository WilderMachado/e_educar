@extends('layouts.app')
@section('content')
        <div class="card-panel  #388e3c green darken-2 center">
            <span class="grey-text text-lighten-5">Anos</span>
        </div>
            <table class="table">
            <thead>
            <tr>
                <th>Código</th>
                <th>Início</th>
                <th>Término</th>
                @can('acao', eeducar\Ano::class)
                <th>Ação</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($anos as $ano)

                <tr>

                    <td>{{$ano->codigo}}</td>
                    <td>{{ date('d/m/Y', strtotime($ano->inicio)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($ano->termino)) }}</td>
                    <td>
                        @can('alterar', eeducar\Ano::class)
                        <a class="btn-floating blue tooltipped" data-tooltip="Editar"
                           href="{{ route('anos.editar', ['codigo'=>$ano->id]) }}">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        @endcan
                    </td>
                </tr>

            @endforeach
            </tbody>
            {!! $anos->render() !!}
        </table>
        <br/>
        <br/>
        @can('salvar', eeducar\Ano::class)
        <a href="{{ route('anos.novo')}}" class="btn btn-primary light-blue darken-3"> Novo Ano</a>
        @endcan
@endsection