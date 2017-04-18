<?php

namespace eeducar;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function dependentes()
    {
        return $this->hasMany(Aluno::class, 'responsavel_id');
    }

    public function chatsEnviados()
    {
        return $this->hasMany(Chat::class, 'remetente_id');
    }

    public function chatsRecebidos()
    {
        return $this->hasMany(Chat::class, 'destinatario_id');
    }

    public function scopeComChat($query, $id){
        return $query->has('chatsEnviados')->where('id','<>', $id);
    }

    public function avaliacoes()
    {
        return $this->belongsToMany(Avaliacao::class, 'avaliacao_responsavel', 'responsavel_id', 'avaliacao_id');
    }
}
