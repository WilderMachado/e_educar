<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'alunos', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'alunos', 'uses' => 'AlunoController@index']);
    Route::get('novo', ['as' => 'alunos.novo', 'uses' => 'AlunoController@novo']);
    Route::post('salvar', ['as' => 'alunos.salvar', 'uses' => 'AlunoController@salvar']);
    Route::get('{id}/editar', ['as' => 'alunos.editar', 'uses' => 'AlunoController@editar']);
    Route::get('{id}/excluir', ['as' => 'alunos.excluir', 'uses' => 'AlunoController@excluir']);

});
Route::group(['prefix' => 'anos', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'anos', 'uses' => 'AnoController@index'])->middleware('can:visualizar,eeducar\Ano');
    Route::get('novo', ['as' => 'anos.novo', 'uses' => 'AnoController@novo'])->middleware('can:salvar,eeducar\Ano');
    Route::post('salvar', ['as' => 'anos.salvar', 'uses' => 'AnoController@salvar'])->middleware('can:salvar,eeducar\Ano');
    Route::get('{id}/editar', ['as' => 'anos.editar', 'uses' => 'AnoController@editar'])->middleware('can:alterar,eeducar\Ano');
    Route::put('{id}/alterar', ['as' => 'anos.alterar', 'uses' => 'AnoController@alterar'])->middleware('can:alterar,eeducar\Ano');
    //Route::get('{id}/excluir', ['as' => 'anos.excluir', 'uses' => 'AnoController@excluir']);
});

Route::group(['prefix' => 'avaliacoes', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'avaliacoes', 'uses' => 'AvaliacaoController@index']);
    Route::get('novo', ['as' => 'avaliacoes.novo', 'uses' => 'AvaliacaoController@novo']);
    Route::post('salvar', ['as' => 'avaliacoes.salvar', 'uses' => 'AvaliacaoController@salvar']);
    Route::get('{id}/editar', ['as' => 'avaliacoes.editar', 'uses' => 'AvaliacaoController@editar']);
    Route::put('{id}/alterar', ['as' => 'avaliacoes.alterar', 'uses' => 'AvaliacaoController@alterar']);
    Route::get('{id}/excluir', ['as' => 'avaliacoes.excluir', 'uses' => 'AvaliacaoController@excluir']);
});

Route::group(['prefix' => 'avisos', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'avisos', 'uses' => 'AvisoController@index']);
    Route::get('novo', ['as' => 'avisos.novo', 'uses' => 'AvisoController@novo']);
    Route::post('salvar', ['as' => 'avisos.salvar', 'uses' => 'AvisoController@salvar']);
    Route::get('{id}/editar', ['as' => 'avisos.editar', 'uses' => 'AvisoController@editar']);
    Route::put('{id}/alterar', ['as' => 'avisos.alterar', 'uses' => 'AvisoController@alterar']);
    Route::get('{id}/excluir', ['as' => 'avisos.excluir', 'uses' => 'AvisoController@excluir']);
});

Route::group(['prefix' => 'disciplinas', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'disciplinas', 'uses' => 'DisciplinaController@index'])->middleware('can:visualizar,eeducar\Disciplina');
    Route::get('novo', ['as' => 'disciplinas.novo', 'uses' => 'DisciplinaController@novo'])->middleware('can:salvar,eeducar\Disciplina');
    Route::post('salvar', ['as' => 'disciplinas.salvar', 'uses' => 'DisciplinaController@salvar'])->middleware('can:salvar,eeducar\Disciplina');
    Route::get('{id}/editar', ['as' => 'disciplinas.editar', 'uses' => 'DisciplinaController@editar'])->middleware('can:alterar,eeducar\Disciplina');
    Route::put('{id}/alterar', ['as' => 'disciplinas.alterar', 'uses' => 'DisciplinaController@alterar'])->middleware('can:alterar,eeducar\Disciplina');
    Route::get('{id}/excluir', ['as' => 'disciplinas.excluir', 'uses' => 'DisciplinaController@excluir'])->middleware('can:excluir,eeducar\Disciplina');;
});

Route::group(['prefix' => 'documentos', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'documentos', 'uses' => 'DocumentoController@index']);
    Route::get('novo', ['as' => 'documentos.novo', 'uses' => 'DocumentoController@novo']);
    Route::post('salvar', ['as' => 'documentos.salvar', 'uses' => 'DocumentoController@salvar']);
    Route::get('{id}/editar', ['as' => 'documentos.editar', 'uses' => 'DocumentoController@editar']);
    Route::put('{id}/alterar', ['as' => 'documentos.alterar', 'uses' => 'DocumentoController@alterar']);
    Route::get('{id}/excluir', ['as' => 'documentos.excluir', 'uses' => 'DocumentoController@excluir']);
});

Route::group(['prefix' => 'perguntas', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'perguntas', 'uses' => 'PerguntaController@index']);
    Route::get('novo', ['as' => 'perguntas.novo', 'uses' => 'PerguntaController@novo']);
    Route::post('salvar', ['as' => 'perguntas.salvar', 'uses' => 'PerguntaController@salvar']);
    Route::get('{id}/editar', ['as' => 'perguntas.editar', 'uses' => 'PerguntaController@editar']);
    Route::put('{id}/alterar', ['as' => 'perguntas.alterar', 'uses' => 'PerguntaController@alterar']);
    Route::get('{id}/excluir', ['as' => 'perguntas.excluir', 'uses' => 'PerguntaController@excluir']);
});

Route::group(['prefix' => 'professores', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'professores', 'uses' => 'ProfessorController@index'])->middleware('can:visualizar,eeducar\Professor');
    Route::get('novo', ['as' => 'professores.novo', 'uses' => 'ProfessorController@novo'])->middleware('can:salvar,eeducar\Professor');
    Route::post('salvar', ['as' => 'professores.salvar', 'uses' => 'ProfessorController@salvar'])->middleware('can:salvar,eeducar\Professor');
    Route::get('{id}/editar', ['as' => 'professores.editar', 'uses' => 'ProfessorController@editar'])->middleware('can:alterar,eeducar\Professor');
    Route::put('{id}/alterar', ['as' => 'professores.alterar', 'uses' => 'ProfessorController@alterar'])->middleware('can:alterar,eeducar\Professor');
    Route::get('{id}/excluir', ['as' => 'professores.excluir', 'uses' => 'ProfessorController@excluir'])->middleware('can:excluir,eeducar\Professor');
});

Route::group(['prefix' => 'respostas', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'respostas', 'uses' => 'RespostaController@index']);
});

Route::group(['prefix' => 'turmas', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'turmas', 'uses' => 'TurmaController@index'])->middleware('can:visualizar,eeducar\Turma');
    Route::get('novo', ['as' => 'turmas.novo', 'uses' => 'TurmaController@novo'])->middleware('can:salvar,eeducar\Turma');
    Route::post('salvar', ['as' => 'turmas.salvar', 'uses' => 'TurmaController@salvar'])->middleware('can:salvar,eeducar\Turma');
    Route::get('{id}/editar', ['as' => 'turmas.editar', 'uses' => 'TurmaController@editar'])->middleware('can:alterar,eeducar\Turma');
    Route::put('{id}/alterar', ['as' => 'turmas.alterar', 'uses' => 'TurmaController@alterar'])->middleware('can:alterar,eeducar\Turma');
    Route::get('{id}/excluir', ['as' => 'turmas.excluir', 'uses' => 'TurmaController@excluir'])->middleware('auth');
});

/*Route::group(['prefix' => 'users', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'users', 'uses' => 'UserController@index']);
});*/