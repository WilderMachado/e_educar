<?php

namespace eeducar;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    protected $table = "avisos";
    protected $fillable = ['titulo', 'mensagem'];

    public function turmas()
    {
        return $this->belongsToMany(Turma::class);
    }

    public function scopeAntigos($query)
    {
        return $query->whereDate('created_at', '<=', Carbon::now()->subDay(15));
    }
}
