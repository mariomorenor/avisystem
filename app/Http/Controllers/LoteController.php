<?php

namespace App\Http\Controllers;

use App\Lote;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    // RUTAS CONTROL
    public function controlLotes()
    {
        $number_of_Lotes = Lote::all()->count();
        
        if($number_of_Lotes == 0)
            return $this->not_Found();//Si no existen lotes en "Control" Se muestra una vista diciendo que no hay :v
        
        return view('lote.control.index');
    }


    public function not_Found() //Funcion que se ejecuta cuando no existen lotes asignados a un control
    {
        return view('lote.control.Lotes_Sin_Asignar');   
    }
        // RUTAS PRODUCTION

    public function productionLotes()
    {   
        return view('lote.production.index');
    }

    public function getLotes(Request $request)
    {
        if($request->ajax()){
            $lotes_produced = Lote::all();

            return response()->json([
                'rows'=>$lotes_produced
            ]);
        }
            
       
    }
}
