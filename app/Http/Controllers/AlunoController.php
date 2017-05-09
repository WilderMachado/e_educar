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
     * Método que redireciona para página inicial de alunos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome')
            ->paginate(config('constantes.paginacao')); //busca relação de alunos em ordem alfabética utilizando páginação
        return view('aluno.index', compact('alunos'));  //Redireciona para a view com os alunos
    }

    /**Método para chamar tela para cadastro de novo aluno
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function novo()
    {
        $turmas = Turma::orderBy('codigo')->pluck('codigo', 'id');      //Busca turmas ordenando por código, pegando código e id
        $responsaveis = User::where('role', 'responsavel')              //Busca usuário com papel de responsável
        ->orderBy('name')->pluck('name', 'id');                         //Ordena por nome e pega nome e id
        return view('aluno.novo', compact('turmas', 'responsaveis'));   //Redireciona para view de cadastro
    }

    /**Método que salva novo aluno
     * @param AlunoRequest $request dados do aluno a ser cadastrado
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function salvar(AlunoRequest $request)
    {
        $this->validate($request,
            ['matricula' => 'unique:alunos,matricula',  //Valida matrícula
                'email' => 'unique:alunos,email',       //Valida e-mail
            ]);
        $aluno = new Aluno($request->all());            //Cria novo aluno com dados passados
        //Salva arquivo com foto passando o arquivo, o nome da pasta e matrícula do aluno, guardando o caminho da foto
        $aluno->foto = ManipuladorArquivo::salvar($request->file('foto'), 'alunos', $aluno->matricula);
        //Salva dados do responsável, passando aluno, id do responsável e dados do responsável
        $this->salvarResponsavel($aluno, $request->responsavel_id, $request->responsavel);
        $aluno->save();                                 //Salva aluno
        return redirect('alunos');                      //Redireciona para index de alunos
    }

    /**Método que chama tela para edição de dados de aluno
     * @param $id int identificador do aluno
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editar($id)
    {
        $turmas = Turma::orderBy('codigo')->pluck('codigo', 'id');                  //Busca turmas ordenando pelo código
        $responsaveis = User::where('role', 'responsavel')                          //Busca usuários com papel de responsável
        ->orderBy('name')->pluck('name', 'id');                                     //Ordena por nome e pega nome e id
        $aluno = Aluno::find($id);                                                  //Busca aluno pelo id passado
        return view('aluno.editar', compact('aluno', 'turmas', 'responsaveis'));    //Redireciona para view de edição
    }

    /** Método que altera dados de aluno
     * @param AlunoRequest $request dados do aluno para edição
     * @param $id int identificador do aluno a ser alterado
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function alterar(AlunoRequest $request, $id)
    {
        $aluno = Aluno::find($id);                      //Busca aluno pelo id
        $aluno->fill($request->all());                  //Passa dados do request para o aluno
        //Salva arquivo com foto passando o arquivo, o nome da pasta e matrícula do aluno, passando o caminho da foto para variável
        $foto = ManipuladorArquivo::salvar($request->file('foto'), 'alunos', $aluno->matricula);
        if ($foto != null && $foto != $aluno->foto):    //Verifica se variável é diferente de null e diferente do caminho em aluno
            ManipuladorArquivo::excluir($aluno->foto);  //Exclui o arquivo anterior
            $aluno->foto = $foto;                       //Passa o novo caminho para o campo foto em aluno
        endif;
        //Salva dados do responsável, passando aluno, id do responsável e dados do responsável
        $this->salvarResponsavel($aluno, $request->responsavel_id, $request->responsavel);
        $aluno->save();                                 //Salva aluno
        return redirect('alunos');                      //Redireciona para index de alunos
    }

    /**Método para busca de nome e e-mail de responsavel de aluno
     * @return \Illuminate\Http\JsonResponse
     */
    public function buscarResponsavel()
    {
        //Seleciona nome e email de responsável cujo id foi passado e retorna em forma de json
        return response()->json(User::select('name', 'email')->find(Input::get('responsavel_id')));
    }

    /**Método de exclusão de aluno
     * @param $id int identificador do aluno
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function excluir($id)
    {
        Aluno::find($id)->delete(); //Busca aluno pelo id e exclui
        return redirect('alunos');  //Redireciona para index de alunos
    }

    /** Método para salvar responsável por aluno
     * @param Aluno $aluno aluno
     * @param $responsavel_id int identificador do responsa´vel
     * @param $dados array dados do responsável
     */
    private function salvarResponsavel(Aluno $aluno, $responsavel_id, $dados)
    {
        if ($responsavel_id):                                   //Se existir id de responsável
            $aluno->responsavel()->associate($responsavel_id);  //Associa id do responsável ao aluno
            if ($dados):                                        //Se existir dados
                $aluno->responsavel()->update([
                    'name' => $dados['nome'],
                    'email' => $dados['email'],
                    'password' => bcrypt($dados['password']),
                    'role' => 'responsavel'
                ]);                                             //Altera dados do responsável
            endif;
        else:                                                   //Se não houver id de responsável (nulo)
            $aluno->responsavel()->associate(User::create([
                'name' => $dados['nome'],
                'email' => $dados['email'],
                'password' => bcrypt($dados['password']),
                'role' => 'responsavel'
            ]));                                                //Cria novo responsável e associa ao aluno
        endif;
    }
}