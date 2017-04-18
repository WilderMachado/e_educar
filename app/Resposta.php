<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $fillable = ['campo_resposta','pergunta_id', 'avaliacao_id'];

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
