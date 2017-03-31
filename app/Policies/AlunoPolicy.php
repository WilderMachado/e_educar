<?php

namespace eeducar\Policies;

use eeducar\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlunoPolicy
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

    public function excluir(User $user)
    {
        return $user->role == 'admin';
    }

    public function acao(User $user)
    {
        return $this->alterar($user) || $this->excluir($user);
    }

    public function carregar(User $user)
    {
        return $user->role == 'admin';
    }
}
