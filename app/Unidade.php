<?php

namespace eeducar;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    public function ano(){
        return $this->belongsTo(Ano::class);
    }
}
