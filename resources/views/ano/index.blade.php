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
                        <a title="Editar"
                           href="{{ route('anos.editar', ['codigo'=>$ano->id]) }}">
                            <em class="glyphicon glyphicon-edit"></em>
                        </a>
                        @endcan
                    </td>
                </tr>

            @endforeach
            </tbody>
            {!! $anos->render() !!}
        </table>
        @can('salvar', eeducar\Ano::class)
        <a href="{{ route('anos.novo')}}" class="btn btn-primary"> Novo Ano</a>
        @endcan
        {!! Html::script('js/index.js') !!}
@endsection