<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    protected $table = "avisos";
    protected $fillable = ['titulo', 'mensagem'];

    public function turmas()
    {
        return $this->belongsToMany(Turma::class);
    }
}
