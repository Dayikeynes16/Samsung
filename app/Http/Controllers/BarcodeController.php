<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\productoventa;
use App\Models\venta;

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
        $producto = producto::all();
        return view('barcode',['producto'=>$producto,'venta'=>$venta,'productoventa'=>$productoventa]);
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
        $venta->save();
        return redirect()->route('barcode');
    }
}

