<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidade extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['codigo', 'inicio', 'termino'];
    protected $hidden = ['deleted_at'];

    public function ano()
    {
        return $this->belongsTo(Ano::class);
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}