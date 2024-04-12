<?php

namespace App\Http\Controllers;

use App\Models\venta;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    function reportes () {
        $ventas = venta::whereDate('fecha',today())->
                        where('finalizada',1)->get();

        $total = venta::whereDate('fecha',today())->
        sum('total');
        $transferencias = venta::whereDate('fecha',today())->
        where('metodo_de_pago','transferencia')->
        sum('total');

        return view ('reportes',["ventas"=>$ventas, 'total'=>$total, 'transferencias'=>$transferencias]);
    }
}
