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
}
