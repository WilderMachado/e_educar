<?php

namespace eeducar\Policies;

use eeducar\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerguntaPolicy
{
    use HandlesAuthorization;

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
}
