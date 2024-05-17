<?php

namespace App\Http\Controllers;

use App\Models\precioespecial;
use Illuminate\Http\Request;
use App\Models\clientes;
use App\Models\producto;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use App\Models\venta;


class DescuentosController extends Controller
{
    function descuentos(){
        $clientes = clientes::all();
      
        return view ('descuentos',['clientes' => $clientes]);
    }
    function editing(){
        return view('editing');
    }

    function savingclient(Request $request){
        $cliente = new clientes([
            'nombre' => $request->input('name'),
            'nickname' => $request->input('nickname'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion')

        ]);
        $cliente->save();

        return  redirect()->route('descuentos');
    }

    function infoclient($id){
        $cliente = clientes::find($id);
        $productos = producto::all();
        $precioespecial = precioespecial::where('cliente_id', $cliente->id)->get();
        
        $ventas = $cliente->ventas;
    


        return view('infoclient',['cliente'=>$cliente,'productos'=>$productos,'precioespecial'=>$precioespecial,'ventas'=>$ventas]);
    }


function savediscount(Request $request){

    try {
        $discount = new precioespecial([
            'cliente_id' => $request->input('cliente'),
            'producto_id' => $request->input('producto'),
            'precio_especial' => $request->input('precio')
        ]);

        $discount->save();

        return redirect()->route('infoclient', $request->input('cliente'));

    } catch (QueryException $e) {
      
        if ($e->errorInfo[1] == 1062) {
            return Redirect::back()->withErrors(['error' => 'Ya existe un descuento para este producto'])->withInput();
        }
        
        return Redirect::back()->withErrors(['error' => 'Error al guardar el descuento: ' . $e->getMessage()])->withInput();
    }
}


    function deletediscount(Request $request){

        $id = $request->input('cliente');
        $discount = precioespecial::where('cliente_id',$request->input('cliente'))->where('producto_id',$request->input('producto'))->delete();
        return redirect()->route('infoclient',$id);
    }
    function ventadetalles($id){
        $venta = Venta::with('productoventas.producto','cliente')->find($id);
        return view('Producto',['venta'=>$venta]);
    }


}
