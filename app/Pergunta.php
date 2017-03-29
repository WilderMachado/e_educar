<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pergunta extends Model
{
    use SoftDeletes

    protected $softDelete = true;
    protected $fillable = ['enunciado', 'pergunta_fechada'];
    protected $hidden = ['deleted_at'];

    /**
     * Busca avalia��es que t�m a pergunta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function avaliacoes()
    {
        return $this->belongsToMany(Avaliacao::class);
    }
    /**
     * Busca as op��es de resposta � pergunta, quando fechada
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opcoesResposta()
    {
        return $this->hasMany(OpcaoResposta::class);
    }
    /**
     * Busca respostas � pergunta
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}
