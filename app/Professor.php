<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['matricula', 'nome', 'email', 'curriculo'];
    protected $hidden = ['deleted_at'];
}
