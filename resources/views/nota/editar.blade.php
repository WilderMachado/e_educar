@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Nova Nota</span>
        </div>
        <h4>Turma: {{$turma->descricao}}</h4>
        <h4>Disciplina: {{$disciplina->nome}}</h4>
        <h4>Unidade: {{$unidade->codigo}}</h4>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>['notas.alterar',$turma->id,$disciplina->id,$unidade->id], 'method'=>'put']) !!}
            @php $indice=0 @endphp
            @foreach($alunos as $aluno)
                <div class="form-group">
                    {!! Form::label ('aluno', $aluno->nome,[ 'class'=>'control-label col-xs-2']) !!}
                    @foreach($disciplina->notas->intersect($unidade->notas->intersect($aluno->notas)) as $nota)
                        <div class="col-xs-1">
                            {!! Form::hidden ("notas[$indice][id]", $nota->id) !!}
                            {!! Form::text ("notas[$indice][valor]",$nota->valor , ['class'=>'form-control']) !!}
                            @php $indice++ @endphp
                        </div>
                    @endforeach
                    @for($i=0;$i<$qtd-$disciplina->notas->intersect($unidade->notas->intersect($aluno->notas))->count(); $i++)
                        <div class="col-xs-1">
                            {!! Form::button('', ['class'=>'glyphicon glyphicon-plus-sign btn-nota']) !!}
                            {!! Form::hidden ("notas[$indice][aluno_id]", $aluno->id) !!}
                            {!! Form::text ("notas[$indice][valor]",null , ['class'=>'form-control txt-nota', 'disabled']) !!}
                            @php $indice++ @endphp
                        </div>
                    @endfor
                </div>
            @endforeach
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    {!! Form::submit ('Salvar', ['class'=>'btn btn-primary light-blue darken-3']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    {!! Html::script('js/nota.js') !!}
@endsection