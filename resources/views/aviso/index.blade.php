@extends('layouts.app')
@section('content')
    <div class="card-panel  #388e3c green darken-2 center">
        <span class=" grey-text text-lighten-5">Avisos</span>
    </div>
    {!! $avisos->render() !!}
    @forelse($avisos as $aviso)
        <fieldset>
            <legend>{{$aviso->titulo}}</legend>
            <label for="{{$aviso->id}}">{{'Data/Hora: '.date('d/m/Y H:i:s', strtotime($aviso->created_at))}}</label>
            <br/>
            <div class="col-xs-5">
                <textarea readonly class="form-control" id="{{$aviso->id}}">{{$aviso->mensagem}}</textarea>
            </div>
            @can('alterar', eeducar\Aviso::class)
            <a title="Editar"
               href="{{ route('avisos.editar', ['id'=>$aviso->id]) }}">
                <em class="glyphicon glyphicon-edit"></em>
            </a>
            @endcan
            @can('excluir', eeducar\Aviso::class)
            <a class="btn-excluir" title="Excluir"
               href="{{ route('avisos.excluir', ['id'=>$aviso->id]) }}">
                <em class="glyphicon glyphicon-trash"></em>
            </a>
            @endcan
        </fieldset>
        <hr>
    @empty
        <tr>
            <td colspan="3">Sem Avisos!</td>
        </tr>
    @endforelse
    <br/>
    <br/>
    @can('salvar', eeducar\Aviso::class)
    <a href="{{ route('avisos.novo')}}" class="btn btn-primary">Novo aviso</a>
    @endcan
    {!! Html::script('js/index.js') !!}
@endsection
