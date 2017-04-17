<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avaliacao extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['id', 'ano_id', 'inicio', 'termino'];
    protected $hidden = ['deleted_at'];

    /**
     * Busca o semestre relacionado a avalia��o
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ano()
    {
        return $this->belongsTo(Ano::class);
    }

    /**
     * Busca perguntas da avalia��o
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function perguntas()
    {
        return $this->belongsToMany(Pergunta::class);
    }

    /**
     * Busca respostas da avalia��o
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }

    /**
     * Busca disciplinas da avaliadas
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class);
    }

    public function scopeAberta($query)
    {
        return $query->whereDate('inicio', '<=', date('Y-m-d'))
            ->whereDate('termino', '>=', date('Y-m-d'))
            ->with('perguntas.opcoesResposta');
    }
}
