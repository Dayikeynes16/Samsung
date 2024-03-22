<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\productoventa;
use App\Models\venta;

class VentaController extends Controller
{
    //
    public function store(Request $request)
    {
        $venta = new venta([
            'operador' => $request->operador,
            'metodo_de_pago' => $request->metodo_de_pago,
        ]);
        $venta->save();

        foreach ($request->productos as $prodData) {
            $producto = producto::find($prodData['codigo']);
            if ($producto) {
                $venta->productos()->attach($producto->codigo, [
                    'cantidad' => $prodData['cantidad'],
                    'subtotal' => $prodData['cantidad'] * $producto->precio
                ]);
            }
        }

        $venta->total = $venta->productos()->sum('subtotal');
        $venta->save();

        return response()->json($venta);
    }

}
