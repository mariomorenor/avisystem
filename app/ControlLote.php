<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControlLote extends Model
{

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
}
