<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpcaoResposta extends Model
{
use SoftDeletes

    protected $softDelete = true;
    protected $fillable = ['resposta_opcao'];
    protected $hidden = ['deleted_at'];

    /**
     * Busca pergunta que se relaciona com a opção de resposta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }
}
