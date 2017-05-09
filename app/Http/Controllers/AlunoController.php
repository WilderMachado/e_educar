<?php

namespace eeducar\Http\Controllers;

use eeducar\Aluno;
use eeducar\Http\ManipuladorArquivo;
use eeducar\Http\Requests\AlunoRequest;
use eeducar\Turma;
use eeducar\User;
use Illuminate\Support\Facades\Input;

class AlunoController extends Controller
{
    /**
     * M�todo que redireciona para p�gina inicial de alunos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome')
            ->paginate(config('constantes.paginacao')); //busca rela��o de alunos em ordem alfab�tica utilizando p�gina��o
        return view('aluno.index', compact('alunos'));  //Redireciona para a view com os alunos
    }

    /**M�todo para chamar tela para cadastro de novo aluno
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function novo()
    {
        $turmas = Turma::orderBy('codigo')->pluck('codigo', 'id');      //Busca turmas ordenando por c�digo, pegando c�digo e id
        $responsaveis = User::where('role', 'responsavel')              //Busca usu�rio com papel de respons�vel
        ->orderBy('name')->pluck('name', 'id');                         //Ordena por nome e pega nome e id
        return view('aluno.novo', compact('turmas', 'responsaveis'));   //Redireciona para view de cadastro
    }

    /**M�todo que salva novo aluno
     * @param AlunoRequest $request dados do aluno a ser cadastrado
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function salvar(AlunoRequest $request)
    {
        $this->validate($request,
            ['matricula' => 'unique:alunos,matricula',  //Valida matr�cula
                'email' => 'unique:alunos,email',       //Valida e-mail
            ]);
        $aluno = new Aluno($request->all());            //Cria novo aluno com dados passados
        //Salva arquivo com foto passando o arquivo, o nome da pasta e matr�cula do aluno, guardando o caminho da foto
        $aluno->foto = ManipuladorArquivo::salvar($request->file('foto'), 'alunos', $aluno->matricula);
        //Salva dados do respons�vel, passando aluno, id do respons�vel e dados do respons�vel
        $this->salvarResponsavel($aluno, $request->responsavel_id, $request->responsavel);
        $aluno->save();                                 //Salva aluno
        return redirect('alunos');                      //Redireciona para index de alunos
    }

    /**M�todo que chama tela para edi��o de dados de aluno
     * @param $id int identificador do aluno
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editar($id)
    {
        $turmas = Turma::orderBy('codigo')->pluck('codigo', 'id');                  //Busca turmas ordenando pelo c�digo
        $responsaveis = User::where('role', 'responsavel')                          //Busca usu�rios com papel de respons�vel
        ->orderBy('name')->pluck('name', 'id');                                     //Ordena por nome e pega nome e id
        $aluno = Aluno::find($id);                                                  //Busca aluno pelo id passado
        return view('aluno.editar', compact('aluno', 'turmas', 'responsaveis'));    //Redireciona para view de edi��o
    }

    /** M�todo que altera dados de aluno
     * @param AlunoRequest $request dados do aluno para edi��o
     * @param $id int identificador do aluno a ser alterado
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function alterar(AlunoRequest $request, $id)
    {
        $aluno = Aluno::find($id);                      //Busca aluno pelo id
        $aluno->fill($request->all());                  //Passa dados do request para o aluno
        //Salva arquivo com foto passando o arquivo, o nome da pasta e matr�cula do aluno, passando o caminho da foto para vari�vel
        $foto = ManipuladorArquivo::salvar($request->file('foto'), 'alunos', $aluno->matricula);
        if ($foto != null && $foto != $aluno->foto):    //Verifica se vari�vel � diferente de null e diferente do caminho em aluno
            ManipuladorArquivo::excluir($aluno->foto);  //Exclui o arquivo anterior
            $aluno->foto = $foto;                       //Passa o novo caminho para o campo foto em aluno
        endif;
        //Salva dados do respons�vel, passando aluno, id do respons�vel e dados do respons�vel
        $this->salvarResponsavel($aluno, $request->responsavel_id, $request->responsavel);
        $aluno->save();                                 //Salva aluno
        return redirect('alunos');                      //Redireciona para index de alunos
    }

    /**M�todo para busca de nome e e-mail de responsavel de aluno
     * @return \Illuminate\Http\JsonResponse
     */
    public function buscarResponsavel()
    {
        //Seleciona nome e email de respons�vel cujo id foi passado e retorna em forma de json
        return response()->json(User::select('name', 'email')->find(Input::get('responsavel_id')));
    }

    /**M�todo de exclus�o de aluno
     * @param $id int identificador do aluno
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function excluir($id)
    {
        Aluno::find($id)->delete(); //Busca aluno pelo id e exclui
        return redirect('alunos');  //Redireciona para index de alunos
    }

    /** M�todo para salvar respons�vel por aluno
     * @param Aluno $aluno aluno
     * @param $responsavel_id int identificador do responsa�vel
     * @param $dados array dados do respons�vel
     */
    private function salvarResponsavel(Aluno $aluno, $responsavel_id, $dados)
    {
        if ($responsavel_id):                                   //Se existir id de respons�vel
            $aluno->responsavel()->associate($responsavel_id);  //Associa id do respons�vel ao aluno
            if ($dados):                                        //Se existir dados
                $aluno->responsavel()->update([
                    'name' => $dados['nome'],
                    'email' => $dados['email'],
                    'password' => bcrypt($dados['password']),
                    'role' => 'responsavel'
                ]);                                             //Altera dados do respons�vel
            endif;
        else:                                                   //Se n�o houver id de respons�vel (nulo)
            $aluno->responsavel()->associate(User::create([
                'name' => $dados['nome'],
                'email' => $dados['email'],
                'password' => bcrypt($dados['password']),
                'role' => 'responsavel'
            ]));                                                //Cria novo respons�vel e associa ao aluno
        endif;
    }
}