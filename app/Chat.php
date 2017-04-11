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
    public function scopeLista($query, $id)
    {
        return $query
            ->join('users','chats.remetente_id','=','users.id')
            //->join('users','chats.destinatario_id','=','users.id')
            ->select('chats.*','users.name')
            ->where('remetente_id',$id)
            ->orWhere('destinatario_id',$id)
            ->get();
    }
}
