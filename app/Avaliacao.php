<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avaliacao extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['id', 'semestre_id', 'inicio', 'termino'];
    protected $hidden = ['deleted_at'];
}
