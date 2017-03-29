<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $fillable = ['campo_resposta'];

    /**
     * Busca a disciplina que se relaciona � resposta
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
     * Busca avalia��o relacionada � resposta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class);
    }
}
