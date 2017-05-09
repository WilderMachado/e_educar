@extends('layouts.app')
@section('content')

    <div class="panel panel-default panel-table">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class="grey-text text-lighten-5">Novo Aluno</span>
        </div>
        @include('errors.alert')
        <div class="form-horizontal">
            {!! Form::open(['route'=>'alunos.salvar','enctype'=>'multipart/form-data']) !!}

            <div class="form-group">
                {!! Form::label ('matricula', 'Matrícula: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::text ('matricula', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('nome', 'Nome Completo: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::text ('nome', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('email', 'E-mail: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::text ('email', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('turma_id', 'Turma: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::select('turma_id', $turmas, null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label ('foto', 'Foto: ',[ 'class'=>'control-label col-xs-2']) !!}
                <div class="col-xs-5">
                    {!! Form::file('foto',['class'=>'form-control'] ) !!}
                </div>
            </div>
            <fieldset>
                <legend>Responsável</legend>
                @if($responsaveis->isNotEmpty())
                    {{--  <ul>
                          {!! Form::checkbox('novo_responsavel', true, false,['id'=>'novo_responsavel']) !!}
                          {!! Form::label('novo_responsavel', 'Novo Responsável') !!}
                      </ul> --}}
                    <div class="form-group">
                        {!! Form::label ('responsavel_id', 'Responsável: ',[ 'class'=>'control-label col-xs-2']) !!}
                        <div class="col-xs-5">
                            {!! Form::select('responsavel_id', $responsaveis, null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-offset-2 col-xs-10">
                            {!! Form::button('Novo Responsável',['id'=>'btn-novo-responsavel','class'=>'btn btn-primary']) !!}
                            {!! Form::button('Selecionar Responsavel',['id'=>'btn-selecionar-responsavel','class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                @endif
                <div id="responsavel">
                    <div class="form-group">
                        {!! Form::label ('responsavel[nome]', 'Nome: ',[ 'class'=>'control-label col-xs-2']) !!}
                        <div class="col-xs-5">
                            {!! Form::text ('responsavel[nome]', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label ('responsavel[email]', 'E-mail: ',[ 'class'=>'control-label col-xs-2']) !!}
                        <div class="col-xs-5">
                            {!! Form::text ('responsavel[email]', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label ('responsavel[password]', 'Senha: ',[ 'class'=>'control-label col-xs-2']) !!}
                        <div class="col-xs-5">
                            {!! Form::password ('responsavel[password]', ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label ('responsavel[password_confirmation]', 'Confirmar senha: ',[ 'class'=>'control-label col-xs-2']) !!}
                        <div class="col-xs-5">
                            {!! Form::password ('responsavel[password_confirmation]', ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    {!! Form::submit ('Salvar', ['class'=>'btn btn-primary light-blue darken-3']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    {!! Html::script('js/aluno.js') !!}
@endsection