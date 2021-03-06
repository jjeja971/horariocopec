<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerHorarioController extends Controller
{
    public function verhorario(){
        if(session('usuario')){
            $mes = DB::select('exec SelectMes');
            $turno = DB::select('exec SelectHorarioDia');
            return view ('horario/listaHorario', compact('mes','turno'));
        }else
            return redirect ('/');
    }

    public function irhorario($fecha){   
        if(session('usuario')){  
            $personalrec = DB::select('exec listar_atendedor');
            $turno = DB::select('exec listar_turnos');
            $verificarFecha = DB::select('exec listar_turnos_por_fecha ?', [session('fecha_horario_m')]);
            session()->flash('fecha_horario_m', $fecha);
            return redirect()->action([HorariosController::class, 'horarioManual']);
        }else
            return redirect ('/');
    }

    public function horariosemana($fecha2){
        if(session('usuario')){
            $dato = DB::select('exec HorarioSemana ?;', [$fecha2]);
            return view('reportes/verhorariosemana', compact('dato'));
        }else
            return redirect ('/');
    }

    
    public function export(){
            
        $pdf = PDF::loadView('invoice');
        return $pdf->stream('invoice.pdf');
    }

    public function ver(){
        $fech = '2021-03-12';
        $dato = DB::select('exec HorarioSemana ?;', [$fech]);
        $pdf = \PDF::loadView('reportes/verhorariosemana', compact('dato'));
        return $pdf->download('ejemplo.pdf');
   }

}

