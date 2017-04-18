<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplina extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['codigo', 'nome', 'carga_horaria'];
    protected $hidden = ['deleted_at'];

    public function professores()
    {
        return $this->belongsToMany(Professor::class, 'disciplina_professor_turma');
    }

    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'disciplina_professor_turma');
    }

}
