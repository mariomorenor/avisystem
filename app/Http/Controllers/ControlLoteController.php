<?php

namespace App\Http\Controllers;

use App\ControlLote;
use App\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlLoteController extends Controller
{
    public function store_control_lote(Lote $lote)
    {
     

        return $lote;
    }
}
