<?php

namespace eeducar\Policies;

use eeducar\Turma;
use eeducar\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TurmaPolicy
{
    use HandlesAuthorization;

    public function visualizar(User $user)
    {
        return $user->role == 'admin';
    }

    public function salvar(User $user)
    {
        return $user->role == 'admin';
    }

    public function alterar(User $user)
    {
        return $user->role == 'admin';
    }

    public function excluir(User $user, Turma $turma)
    {
        return $user->role == 'admin' && $turma->alunos->isEmpty();
    }

    public function acao(User $user)
    {
        return $this->alterar($user) || $this->excluir($user);
    }
}
