@extends('layouts.app')
@section('content')

    <div class="category">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Avalia��es</span>
        </div>
        <table class="highlight  responsive-table">
            <thead>
            <tr>
                <th>Ano</th>
                <th>In�cio</th>
                <th>T�rmino</th>
                @can('acao', eeducar\Avaliacao::class)
                <th>A��o</th>
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
                        <a class="btn-floating blue tooltipped" data-tooltip="Editar"
                           href="{{ route('avaliacoes.editar', ['id'=>$avaliacao->id]) }}">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        @endcan
                        @can('excluir', eeducar\Avaliacao::class)
                        <a class="btn-floating red btn-excluir tooltipped" data-tooltip="Excluir"
                           href="{{ route('avaliacoes.excluir', ['id'=>$avaliacao->id]) }}">
                            <i class="material-icons">delete</i>
                        </a>
                        @endcan
                        @can('relatorio', eeducar\Avaliacao::class)
                        <a class="btn-floating grey darken-3 tooltipped" data-tooltip="Relat�rio" target="_blank"
                           href="{{ route('avaliacoes.relatorio', ['id'=>$avaliacao->id]) }}">
                            <i class="material-icons">description</i>
                        </a>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Sem Avalia��es!</td>
                </tr>
            @endforelse
            </tbody>
            {!! $avaliacoes->render() !!}
        </table>
        <br/>
        <br/>
        @can('salvar', eeducar\Avaliacao::class)
        <a href="{{ route('avaliacoes.novo')}}" class="btn btn-primary light-blue darken-3"> Nova avalia��o</a>
        @endcan
    </div>

@endsection