<?php

namespace App\Http\Controllers;

use App\Lote;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
}
