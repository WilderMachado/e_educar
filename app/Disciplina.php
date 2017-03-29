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

    /**
     * Busca avaliações relacionadas a disciplina
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function avaliacoes()
    {
        return $this->belongsToMany(Avaliacao::class);
    }

    /**
     * Busca respostas em avaliações relacionadas a essa disciplina
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}
