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
});
Route::group(['prefix' => 'anos', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'anos', 'uses' => 'AnoController@index']);
    Route::get('novo', ['as' => 'anos.novo', 'uses' => 'AnoController@novo']);
    Route::post('salvar', ['as' => 'anos.salvar', 'uses' => 'AnoController@salvar']);
});

Route::group(['prefix' => 'avaliacoes', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'avaliacoes', 'uses' => 'AvaliacaoController@index']);
});

Route::group(['prefix' => 'avisos', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'avisos', 'uses' => 'AvisoController@index']);
});

Route::group(['prefix' => 'disciplinas', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'disciplinas', 'uses' => 'DisciplinaController@index']);
});

Route::group(['prefix' => 'documentos', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'documentos', 'uses' => 'DocumentoController@index']);
});

Route::group(['prefix' => 'perguntas', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'perguntas', 'uses' => 'PerguntaController@index']);
});

Route::group(['prefix' => 'professores', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'professores', 'uses' => 'ProfessorController@index']);
    Route::get('novo', ['as' => 'professores.novo', 'uses' => 'ProfessorController@novo']);
});

Route::group(['prefix' => 'respostas', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'respostas', 'uses' => 'RespostaController@index']);
});

Route::group(['prefix' => 'turmas', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'turmas', 'uses' => 'TurmaController@index']);
    Route::get('novo', ['as' => 'turmas.novo', 'uses' => 'TurmaController@novo']);
    Route::post('salvar', ['as' => 'turmas.salvar', 'uses' => 'TurmaController@salvar']);
});

/*Route::group(['prefix' => 'users', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('', ['as' => 'users', 'uses' => 'UserController@index']);
});*/