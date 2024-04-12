<?php

namespace App\Http\Controllers;

use App\Models\precioespecial;
use Illuminate\Http\Request;
use App\Models\clientes;
use App\Models\producto;


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
            'name' => $request->input('name'),
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
        

        return view('infoclient',['cliente'=>$cliente,'productos'=>$productos,'precioespecial'=>$precioespecial]);
    }
    function savediscount(Request $request){
        $discount = new precioespecial([
            'cliente_id'=>$request->input('cliente'),
            'producto_id'=>$request->input('producto'),
            'precio_especial'=>$request->input('precio')
        ]);
        $id = $request->input('cliente');
        $discount->save();
        return redirect()->route('infoclient',$id);
    }

    function deletediscount(Request $request){

        $id = $request->input('cliente');
        $discount = precioespecial::where('cliente_id',$request->input('cliente'))->where('producto_id',$request->input('producto'))->delete();
        return redirect()->route('infoclient',$id);
    }


}
