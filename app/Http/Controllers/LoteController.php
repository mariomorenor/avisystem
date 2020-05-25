<?php

namespace App\Http\Controllers;

use App\ControlLote;
use App\Lote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoteController extends Controller
{
    // RUTAS CONTROL
    public function controlLotes()
    {
        $number_of_Lotes = ControlLote::all()->count();
        
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
        DB::transaction(function() use ($lote){
            $lote->update(['state'=>'A']);
            $control_lote = new ControlLote;

            $control_lote->lote_id = $lote->id;
            $control_lote->save();

        });

        return redirect()->back();
    }


        // RUTAS PRODUCTION

    public function productionLotes()
    {   
        return view('lote.production.index');
    }

    // Listar Todos los Lotes
    public function getLotes(Request $request)
    {
        if($request->ajax()){
            $lotes_produced = Lote::orderBy('date_in','desc')->get();

            return response()->json([
                'rows'=>$lotes_produced
            ]);
        }  
    }

    // Mostrar detalles de Lote VIsta
    public function show(Lote $lote)
    {
        return view('lote.production.show')->with(['lote'=>$lote]);
    }
}
