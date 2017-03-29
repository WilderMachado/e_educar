<?php

namespace eeducar\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'eeducar\Model' => 'eeducar\Policies\ModelPolicy',
        'eeducar\Aluno' => 'eeducar\Policies\AlunoPolicy',
        'eeducar\Ano' => 'eeducar\Policies\AnoPolicy',
        'eeducar\Avaliacao' => 'eeducar\Policies\AvaliacaoPolicy',
        'eeducar\Aviso' => 'eeducar\Policies\AvisoPolicy',
        'eeducar\Disciplina' => 'eeducar\Policies\DisciplinaPolicy',
        'eeducar\Documento' => 'eeducar\Policies\DocumentoPolicy',
        'eeducar\Pergunta' => 'eeducar\Policies\PerguntaPolicy',
        'eeducar\Professor' => 'eeducar\Policies\ProfessorPolicy',
        'eeducar\Turma' => 'eeducar\Policies\TurmaPolicy',
        'eeducar\User' => 'eeducar\Policies\UserPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
