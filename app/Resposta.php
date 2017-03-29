<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $fillable = ['campo_resposta'];

    /**
     * Busca a disciplina que se relaciona à resposta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    /**
     * Busca pergunta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }

    /**
     * Busca avaliação relacionada à resposta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class);
    }
}
