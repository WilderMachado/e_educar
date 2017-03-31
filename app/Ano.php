<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ano extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['codigo', 'inicio', 'termino'];
    protected $hidden = ['deleted_at'];

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
    public function unidades()
    {
        return $this->hasMany(Unidade::class);
    }
    /**
     * Busca avaliação do semestre
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function avaliacao()
    {
        return $this->hasOne(Avaliacao::class);
    }
}
