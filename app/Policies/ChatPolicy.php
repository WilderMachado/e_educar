<?php

namespace eeducar\Policies;

use eeducar\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatPolicy
{
    use HandlesAuthorization;

    public function visualizar(User $user)
    {
        return $user->role == 'admin';
    }

    public function salvar(User $user)
    {
        return $user->role == 'admin' || $user->role == 'responsavel';
    }

    public function excluir(User $user)
    {
        return $user->role == 'admin';
    }

    public function acao(User $user)
    {
        return $this->salvar($user) || $this->excluir($user);
    }
}
