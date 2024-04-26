<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\producto;
use App\Models\ProductoVenta;
use App\Models\venta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function welcome() {
        $ventas = Venta::with(['productoventas.producto']) // Carga anticipada de productos a través de ProductoVenta
                       ->where('operador', 1)
                       ->where('abierta', 0)
                       ->get();

        $clientes = clientes::all();
    
        // Creando un array estructurado como lo deseas, incluyendo el nombre del producto
        $ventasArray = $ventas->map(function ($venta) {
            return [
                'id_venta' => $venta->id_venta,
                'operador' => $venta->operador,
                'abierta' => $venta->abierta,
                'productos' => $venta->productoventas->map(function ($productoventa) {
                    return [
                        'producto_id' => $productoventa->producto_id,
                        'nombre_producto' => $productoventa->producto->nombre, // Añadiendo el nombre del producto
                        'cantidad' => $productoventa->cantidad,
                        'subtotal' => $productoventa->subtotal
                    ];
                })
            ];
        });
        return view('welcome', ['ventas' => $ventasArray, 'clientes' => $clientes]);
    }
    function home (){
        return view ('home');
    }
    function login(){
        return view ('login');
    }
    public function getVentasAjax() {
        $ventas = Venta::with(['productoventas.producto']) // Carga anticipada de productos
                       ->where('operador', 1)
                       ->where('abierta', 0)
                       ->get();
    
        // Retorna los datos como JSON
        return response()->json($ventas);
    }
    

}

