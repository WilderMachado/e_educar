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
}
