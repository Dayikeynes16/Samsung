<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\precioespecial;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\productoventa;
use App\Models\venta;
use LaravelJsonApi\Eloquent\Filters\Where;
use Psy\Readline\Hoa\Console;

class BarcodeController extends Controller
{
    function barcode(){
        
        $venta = Venta::firstOrCreate(
            ['finalizada' => false, 'abierta' => true],
            [
                'operador' => null, 
                'total' => 0.00, 
                'metodo_de_pago' => 'efectivo' 
            ]
        );
        $productoventa = productoventa::where('venta_id',$venta->id_venta)->get();
        $totalActualizado = productoventa::where('venta_id', $venta->id_venta)
                                      ->sum('subtotal');
        $venta->total = $totalActualizado;
        
        $venta->save();
        $clientes = clientes::all();
        $producto = producto::all();
        return view('barcode',['producto'=>$producto,'venta'=>$venta,'productoventa'=>$productoventa, 'clientes'=>$clientes]);
    }

    function addingbarcode(request $request){
        $venta = Venta::where('finalizada', false )
                        ->where('abierta', true)
                        ->first(); 

        $idproducto = $request->input('producto');
        $peso = $request->input('peso');
        $producto = producto::find($idproducto);
        $subtotal = $producto->precio*$peso;
        $productoventa =  productoventa::create([
            'venta_id'=>$venta->id_venta,
            'producto_id'=>$idproducto,
            'cantidad'=>$peso,
            'subtotal'=>$subtotal,
            
        ]); 
       return redirect()->route('barcode');
    }

    function deletebarcode($id){
        $productoventa = productoventa::find($id);
        if ($productoventa) {
            $productoventa->delete();
        }
        return redirect()->route('barcode');
    }

    
    function finishbarcode(request $request){
        $id = $request->input('id_venta');
        $metodo = $request->input('metodo_de_pago');
        $venta = venta::find($id);
        $venta->metodo_de_pago = $metodo;
        $venta->finalizada = true;
        $venta->abierta = false;
        $venta->fecha = today();
        $venta->operador = 0;
        $venta->save();
        return redirect()->back();
    }
  
    function aplydiscount(Request $request) {
        $clienteId = $request->input('cliente_id');
        $ventaId = $request->input('id_venta');
        $venta = Venta::find($ventaId);
        if (!$venta) {
            return back()->with('error', 'La venta no existe.');
        }
        $cliente = clientes::find($clienteId);
        if (!$cliente) {
            return back()->with('error', 'El cliente no existe.');
        }
        $productosVenta = ProductoVenta::where('venta_id', $ventaId)->get();
        print($productosVenta);
        foreach ($productosVenta as $productoVenta) {
            $precioEspecial = PrecioEspecial::where('cliente_id', $clienteId)
                                            ->where('producto_id', $productoVenta->producto_id)
                                            ->first();
            if ($precioEspecial) {
                $productoVenta->subtotal = $precioEspecial->precio_especial * $productoVenta->cantidad;
                $productoVenta->save();
            }
        }
        $nuevoTotal = $productosVenta->sum(function ($producto) {
            return $producto->subtotal;
        });
        $venta->total = $nuevoTotal;
        $venta->save();
    
        return back()->with('success', 'Descuento aplicado correctamente.');
    }
    }


