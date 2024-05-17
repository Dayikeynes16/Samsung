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
        where('metodo_de_pago','Transferencia')->
        sum('total');
        $tarjeta = venta::whereDate('fecha',today())->
        where('metodo_de_pago','Tarjeta')->
        sum('total');
        $efectivo = venta::whereDate('fecha',today())->
        where('metodo_de_pago','Efectivo')->
        sum('total');

        return view ('reportes',["ventas"=>$ventas, 'total'=>$total, 'transferencias'=>$transferencias,'tarjeta'=>$tarjeta,'efectivo'=>$efectivo]);
    }
}
