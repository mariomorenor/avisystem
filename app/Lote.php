<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{


    protected $casts=[
        'quantity'=> 'integer',
        'date_in'=>'date:Y-m-d',
        'user_id'=> 'integer'
    ];

    protected $guarded=['id'];
}
