<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['codigo', 'turno', 'ano_id'];
    protected $hidden = ['deleted_at'];

    public function ano()
    {
        return $this->belongsTo(Ano::class);
    }

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'disciplina_professor_turma');
    }

    public function professores()
    {
        return $this->belongsToMany(Professor::class, 'disciplina_professor_turma');
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
    public function avisos()
    {
        return $this->belongsToMany(Aviso::class);
    }
}
