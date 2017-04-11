<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public $timestamps = false;
    protected $fillable = ['mensagem','remetente_id', 'destinatario_id'];

    public function remetente()
    {
        return $this->belongsTo(User::class, 'remetente_id');
    }

    public function destinatario()
    {
        return $this->belongsTo(User::class, 'destinatario_id');
    }
}
