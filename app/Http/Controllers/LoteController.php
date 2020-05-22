<?php

namespace App\Http\Controllers;

use App\ControlLote;
use App\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoteController extends Controller
{
    // RUTAS CONTROL
    public function controlLotes()
    {
        $number_of_Lotes = Lote::where('state','A')->count();
        
        if($number_of_Lotes == 0)
            return $this->not_Found();//Si no existen lotes en "Control" Se muestra una vista diciendo que no hay :v
        
        
        return view('lote.control.index');
    }


    public function not_Found() //Funcion que se ejecuta cuando no existen lotes asignados a un control
    {   
        $lotes = Lote::where('state','W')->get();
        $lotes = count($lotes)==0 ?null :$lotes;
        return view('lote.control.Lotes_Sin_Asignar')->with(['lotes'=>$lotes]);   
    }

    public function store(Request $request)
    {
        $new_lote = new Lote;
        $new_lote->fill($request->all());
        $new_lote->code = '['.$request['date_in'].'-'.Str::random('4').']';   

        $new_lote->save();

        return redirect()->back();
    }

    public function delete(Lote $lote)
    {
        $lote->delete();
       return redirect()->back();
    }

    public function update(Lote $lote)
    {
        $lote->update(['state'=>'A']);
        return redirect()->back();
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
