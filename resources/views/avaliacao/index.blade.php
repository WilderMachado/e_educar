@extends('layouts.app')
@section('content')

        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Avaliacoes</span>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Ano</th>
                <th>Início</th>
                <th>Término</th>
                @can('acao', eeducar\Avaliacao::class)
                <th>Acao</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @forelse($avaliacoes as $avaliacao)
                <tr>
                    <td>{{$avaliacao->ano->codigo}}</td>
                    <td>{{ date('d/m/Y', strtotime($avaliacao->inicio)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($avaliacao->termino)) }}</td>
                    <td>
                        @can('alterar', eeducar\Avaliacao::class)
                        <a title="Editar"
                           href="{{ route('avaliacoes.editar', ['id'=>$avaliacao->id]) }}">
                            <em class="glyphicon glyphicon-edit"></em>
                        </a>
                        @endcan
                        @can('excluir', eeducar\Avaliacao::class)
                        <a class="btn-excluir" title="Excluir"
                           href="{{ route('avaliacoes.excluir', ['id'=>$avaliacao->id]) }}">
                            <em class="glyphicon glyphicon-trash"></em>
                        </a>
                        @endcan
                        @can('relatorio', eeducar\Avaliacao::class)
                        <a title="Relatório" target="_blank"
                           href="{{ route('avaliacoes.relatorio', ['id'=>$avaliacao->id]) }}">
                            <em class="glyphicon glyphicon-list-alt"></em>
                        </a>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Sem Avaliações!</td>
                </tr>
            @endforelse
            </tbody>
            {!! $avaliacoes->render() !!}
        </table>
        @can('salvar', eeducar\Avaliacao::class)
        <a href="{{ route('avaliacoes.novo')}}" class="btn btn-primary"> Nova avaliação</a>
        @endcan
        {!! Html::script('js/index.js') !!}
@endsection