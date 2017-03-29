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
     * Busca avaliações que têm a pergunta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function avaliacoes()
    {
        return $this->belongsToMany(Avaliacao::class);
    }
    /**
     * Busca as opções de resposta à pergunta, quando fechada
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opcoesResposta()
    {
        return $this->hasMany(OpcaoResposta::class);
    }
    /**
     * Busca respostas à pergunta
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}
