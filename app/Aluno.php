<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $fillable = ['matricula', 'nome','turma_id' ,'email','foto'];
    protected $hidden = ['deleted_at'];

    public function turma()
    {
        return $this->belongsTo(Turma::class,'turma_id');
    }
}
