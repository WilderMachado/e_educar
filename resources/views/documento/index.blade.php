@extends('layouts.app')
@section('content')
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Documentos</span>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Título</th>
                <th>Link</th>
                @can('acao', eeducar\Documento::class)
                <th>Ação</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($documentos as $documento)
                <tr>
                    <td>{{$documento->titulo}}</td>
                    <td>
                        @if($documento->url !=null && $documento->url != '' )
                            <a title="Documento" target="_blank"
                               href="{{$documento->url}}">
                                <em class="glyphicon glyphicon-eye-open"></em>
                            </a>
                        @endif
                    </td>
                    <td>
                        @can('alterar', eeducar\Documento::class)
                        <a title="Editar"
                           href="{{ route('documentos.editar', ['id'=>$documento->id]) }}">
                            <em class="glyphicon glyphicon-edit"></em>
                        </a>
                        @endcan
                        @can('excluir', eeducar\Documento::class)
                        <a class="btn-excluir" title="Excluir"
                           href="{{ route('documentos.excluir', ['id'=>$documento->id]) }}">
                            <em class="glyphicon glyphicon-trash"></em>
                        </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            {!! $documentos->render() !!}
        </table>
        <br/>
        <br/>
        @can('salvar', eeducar\Documento::class)
        <a href="{{ route('documentos.novo')}}" class="btn btn-primary"> Novo documento</a>
        @endcan
        {!! Html::script('js/index.js') !!}
@endsection