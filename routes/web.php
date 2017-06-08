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
    Route::get('', ['as' => 'alunos', 'uses' => 'AlunoController@index'])->middleware('can:visualizar,eeducar\Aluno');
    Route::get('novo', ['as' => 'alunos.novo', 'uses' => 'AlunoController@novo'])->middleware('can:salvar,eeducar\Aluno');
    Route::post('salvar', ['as' => 'alunos.salvar', 'uses' => 'AlunoController@salvar'])->middleware('can:salvar,eeducar\Aluno');
    Route::get('{id}/editar', ['as' => 'alunos.editar', 'uses' => 'AlunoController@editar'])->middleware('can:alterar,eeducar\Aluno');
    Route::put('{id}/alterar', ['as' => 'alunos.alterar', 'uses' => 'AlunoController@alterar'])->middleware('can:alterar,eeducar\Aluno');
    Route::get('{id}/excluir', ['as' => 'alunos.excluir', 'uses' => 'AlunoController@excluir'])->middleware('can:excluir,eeducar\Aluno');
    Route::get('{id}/buscarResponsavel', ['as' => 'alunos.buscarResponsavel', 'uses' => 'AlunoController@buscarResponsavel'])->middleware('can:alterar,eeducar\Aluno');
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
    Route::get('', ['as' => 'avaliacoes', 'uses' => 'AvaliacaoController@index'])->middleware('can:visualizar,eeducar\Avaliacao');
    Route::get('novo', ['as' => 'avaliacoes.novo', 'uses' => 'AvaliacaoController@novo'])->middleware('can:salvar,eeducar\Avaliacao');
    Route::post('salvar', ['as' => 'avaliacoes.salvar', 'uses' => 'AvaliacaoController@salvar'])->middleware('can:salvar,eeducar\Avaliacao');
    Route::get('{id}/editar', ['as' => 'avaliacoes.editar', 'uses' => 'AvaliacaoController@editar'])->middleware('can:alterar,eeducar\Avaliacao');
    Route::put('{id}/alterar', ['as' => 'avaliacoes.alterar', 'uses' => 'AvaliacaoController@alterar'])->middleware('can:alterar,eeducar\Avaliacao');
    Route::get('{id}/excluir', ['as' => 'avaliacoes.excluir', 'uses' => 'AvaliacaoController@excluir'])->middleware('can:excluir,eeducar\Avaliacao');
    Route::get('{id}/relatorio', ['as' => 'avaliacoes.relatorio', 'uses' => 'AvaliacaoController@relatorio'])->middleware('can:relatorio,eeducar\Avaliacao');
});

Route::group(['prefix' => 'avisos', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'avisos', 'uses' => 'AvisoController@index'])->middleware('can:visualizar,eeducar\Aviso');
    Route::get('novo', ['as' => 'avisos.novo', 'uses' => 'AvisoController@novo'])->middleware('can:salvar,eeducar\Aviso');
    Route::post('salvar', ['as' => 'avisos.salvar', 'uses' => 'AvisoController@salvar'])->middleware('can:salvar,eeducar\Aviso');
    Route::get('{id}/editar', ['as' => 'avisos.editar', 'uses' => 'AvisoController@editar'])->middleware('can:alterar,eeducar\Aviso');
    Route::put('{id}/alterar', ['as' => 'avisos.alterar', 'uses' => 'AvisoController@alterar'])->middleware('can:alterar,eeducar\Aviso');
    Route::get('{id}/excluir', ['as' => 'avisos.excluir', 'uses' => 'AvisoController@excluir'])->middleware('can:excluir,eeducar\Aviso');
});

Route::group(['prefix' => 'chats', 'where' => ['user_id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'chats', 'uses' => 'ChatController@index'])->middleware('auth');
    Route::get('chat', ['as' => 'chats.chat', 'uses' => 'ChatController@chat'])->middleware('can:salvar,eeducar\Chat');
    Route::post('salvar', ['as' => 'chats.salvar', 'uses' => 'ChatController@salvar'])->middleware('can:salvar,eeducar\Chat');
    Route::get('listar', ['as' => 'chats.listar', 'uses' => 'ChatController@listar'])->middleware('can:salvar,eeducar\Chat');
    Route::get('{user_id}/excluir', ['as' => 'chats.excluir', 'uses' => 'ChatController@excluir'])->middleware('can:excluir,eeducar\Chat');
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
    Route::get('', ['as' => 'documentos', 'uses' => 'DocumentoController@index'])->middleware('can:visualizar,eeducar\Documento');
    Route::get('novo', ['as' => 'documentos.novo', 'uses' => 'DocumentoController@novo'])->middleware('can:salvar,eeducar\Documento');
    Route::post('salvar', ['as' => 'documentos.salvar', 'uses' => 'DocumentoController@salvar'])->middleware('can:salvar,eeducar\Documento');
    Route::get('{id}/editar', ['as' => 'documentos.editar', 'uses' => 'DocumentoController@editar'])->middleware('can:alterar,eeducar\Documento');
    Route::put('{id}/alterar', ['as' => 'documentos.alterar', 'uses' => 'DocumentoController@alterar'])->middleware('can:alterar,eeducar\Documento');
    Route::get('{id}/excluir', ['as' => 'documentos.excluir', 'uses' => 'DocumentoController@excluir'])->middleware('can:excluir,eeducar\Documento');
});

Route::group(['prefix' => 'notas', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'notas', 'uses' => 'NotaController@index'])->middleware('can:visualizar,eeducar\Nota');

    //Route::put('{id}/alterar', ['as' => 'notas.alterar', 'uses' => 'NotaController@alterar'])->middleware('can:alterar,eeducar\Nota');
    //Route::get('{id}/excluir', ['as' => 'notas.excluir', 'uses' => 'NotaController@excluir'])->middleware('can:excluir,eeducar\Nota');
    Route::get('turmas',['as'=>'notas.turmas','uses'=>'NotaController@turmas']);
    Route::get('{turma_id}/disciplinas',['as'=>'notas.disciplinas','uses'=>'NotaController@disciplinas']);
    Route::get('{turma_id}/{disciplina_id}/unidade',['as'=>'notas.unidades','uses'=>'NotaController@unidades']);
    Route::get('{turma_id}/{disciplina_id}/{unidade_id}/novo',['as'=>'notas.novo','uses'=>'NotaController@novo']);
    Route::get('{turma_id}/{disciplina_id}/{unidade_id}/editar', ['as' => 'notas.editar', 'uses' => 'NotaController@editar']);
    Route::post('{turma_id}/{disciplina_id}/{unidade_id}/salvar', ['as' => 'notas.salvar', 'uses' => 'NotaController@salvar']);
    Route::put('{turma_id}/{disciplina_id}/{unidade_id}/alterar', ['as' => 'notas.alterar', 'uses' => 'NotaController@alterar']);
});
Route::group(['prefix' => 'perguntas', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'perguntas', 'uses' => 'PerguntaController@index'])->middleware('can:visualizar,eeducar\Pergunta');
    Route::get('novo', ['as' => 'perguntas.novo', 'uses' => 'PerguntaController@novo'])->middleware('can:salvar,eeducar\Pergunta');
    Route::post('salvar', ['as' => 'perguntas.salvar', 'uses' => 'PerguntaController@salvar'])->middleware('can:salvar,eeducar\Pergunta');
    Route::get('{id}/editar', ['as' => 'perguntas.editar', 'uses' => 'PerguntaController@editar'])->middleware('can:alterar,eeducar\Pergunta');
    Route::put('{id}/alterar', ['as' => 'perguntas.alterar', 'uses' => 'PerguntaController@alterar'])->middleware('can:alterar,eeducar\Pergunta');
    Route::get('{id}/excluir', ['as' => 'perguntas.excluir', 'uses' => 'PerguntaController@excluir'])->middleware('can:excluir,eeducar\Pergunta');
});

Route::group(['prefix' => 'professores', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'professores', 'uses' => 'ProfessorController@index'])->middleware('can:visualizar,eeducar\Professor');
    Route::get('novo', ['as' => 'professores.novo', 'uses' => 'ProfessorController@novo'])->middleware('can:salvar,eeducar\Professor');
    Route::post('salvar', ['as' => 'professores.salvar', 'uses' => 'ProfessorController@salvar'])->middleware('can:salvar,eeducar\Professor');
    Route::get('{id}/editar', ['as' => 'professores.editar', 'uses' => 'ProfessorController@editar'])->middleware('can:alterar,eeducar\Professor');
    Route::put('{id}/alterar', ['as' => 'professores.alterar', 'uses' => 'ProfessorController@alterar'])->middleware('can:alterar,eeducar\Professor');
    Route::get('{id}/excluir', ['as' => 'professores.excluir', 'uses' => 'ProfessorController@excluir'])->middleware('can:excluir,eeducar\Professor');
});

Route::group(['prefix' => 'questionarios', 'middleware' => 'auth'], function () {
    Route::get('', ['as' => 'questionarios', 'uses' => 'QuestionarioController@novo']);
    Route::post('salvar', ['as' => 'questionarios.salvar', 'uses' => 'QuestionarioController@salvar']);
});

Route::group(['prefix' => 'respostas', 'middleware' => 'auth', 'where' => ['id' => '[0-9]+']], function () {
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