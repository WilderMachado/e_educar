<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['matricula', 'nome', 'email'];
    protected $hidden = ['deleted_at'];
}