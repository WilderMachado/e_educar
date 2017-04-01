@extends('layouts.app')
@section('content')
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Avisos</span>
        </div>
        {!! $avisos->render() !!}
        @forelse($avisos as $aviso)
            <fieldset>
                <legend>{{$aviso->titulo}}</legend>
                <label>{{'Data/Hora: '.date('d/m/Y H:i:s', strtotime($aviso->created_at))}}</label>
                <textarea readonly class="materialize-textarea">{{$aviso->mensagem}}</textarea>
                @can('alterar', eeducar\Aviso::class)
                <a class="btn-floating blue tooltipped" data-tooltip="Editar"
                   href="{{ route('avisos.editar', ['id'=>$aviso->id]) }}">
                    <i class="material-icons">mode_edit</i>
                </a>
                @endcan
                @can('excluir', eeducar\Aviso::class)
                <a class="btn-floating red btn-excluir tooltipped" data-tooltip="Excluir"
                   href="{{ route('avisos.excluir', ['id'=>$aviso->id]) }}">
                    <i class="material-icons">delete</i>
                </a>
                @endcan
            </fieldset>
        @empty
            <tr>
                <td colspan="3">Sem Avisos!</td>
            </tr>
        @endforelse
        <br/>
        <br/>
        @can('salvar', eeducar\Aviso::class)
        <a href="{{ route('avisos.novo')}}" class="btn btn-primary light-blue darken-3">Novo aviso</a>
        @endcan
@endsection
