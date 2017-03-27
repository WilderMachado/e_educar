<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['titulo'];
    protected $hidden = ['deleted_at'];
}
