<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['codigo', 'turno', 'semestre_id'];
    protected $hidden = ['deleted_at'];
}
