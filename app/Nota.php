<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nota extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['valor', 'aluno_id', 'turma_id', 'disciplina_id', 'unidade_id'];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}
