@extends('layouts.app')
@section('content')
    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Nova Turma</span>
        </div>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>['turmas.alterar', $turma->id], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label ('codigo', 'Código: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::text ('codigo', $turma->codigo, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('descricao', 'Descrição: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::text ('descricao', $turma->descricao, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('nivel', 'Nível: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::select ('nivel', $niveis, $turma->nivel, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('serie', 'Série: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::text ('serie', $turma->serie, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('turno', 'Turno: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::select ('turno', $turnos, $turma->turno, ['class'=>'form-control','placeholder'=>'']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('ano_id', 'Ano: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::select ('ano_id', $anos, $turma->ano_id, ['class'=>'form-control','placeholder'=>'']) !!}
                </div>
            </div>
            <fildset id="inclusao">
                <legend>Disciplinas</legend>
                @foreach($disciplinasProfessores as $disciplinaProfessor)
                    <div class="disciplina-professor">
                        <div class="form-group">
                            {!! Form::label ('disciplinas[]', 'Disciplina: ',[ 'class'=>'control-label col-xs-2']) !!}
                            <div class="col-xs-5">
                                {!! Form::select ('disciplinas[]', $disciplinas, $disciplinaProfessor->disciplina_id, ['class'=>'form-control','placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label ('professores[]', 'Professor: ',[ 'class'=>'control-label col-xs-2']) !!}
                            <div class="col-xs-5">
                                {!! Form::select ('professores[]', $professores, $disciplinaProfessor->professor_id, ['class'=>'form-control','placeholder'=>'']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                {!! Form::button('Excluir Disciplina', ['class'=>'btn btn-primary light-blue btn-excluir-disciplina']) !!}
                            </div>
                        </div>
                        <hr/>
                    </div>
                @endforeach
            </fildset>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    {!! Form::button('Adicionar Disciplina', ['id'=>'btn-adicionar', 'class'=>'btn btn-primary light-blue']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    {!! Form::submit ('Salvar', ['class'=>'btn btn-primary light-blue darken-3']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    {!! Html::script('js/turma.js') !!}
@endsection