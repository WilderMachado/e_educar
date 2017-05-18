<?php

namespace eeducar\Policies;

use eeducar\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotaPolicy
{
    use HandlesAuthorization;

    public function visualizar(User $user)
    {
        return $user->role == 'admin' || $user->role == 'professor' || $user->role == 'aluno' || $user->role == 'responsavel';
    }

    public function salvar(User $user)
    {
        return $user->role == 'professor';
    }

    public function alterar(User $user)
    {
        return $user->role == 'professor';
    }

    public function excluir(User $user)
    {
        return $user->role == 'professor';
    }

    public function acao(User $user)
    {
        return $this->alterar($user) || $this->excluir($user);
    }
}
