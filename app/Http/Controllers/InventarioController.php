<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\producto;

class InventarioController extends Controller
{
    //
    function Inventario(){
        $producto = producto::all();

        return view('inventario',['producto'=> $producto]);
    }
    function adding (){
        return view('adding');
    }

    function deleteitem($codigo){
        $producto = producto::find($codigo);
        if($producto){
            $producto->delete();
            return redirect()->route('inventario');
        } 
    }


    function addproduct(SaveProduct $request){
        $validatedData = $request->validated();
        
        $producto = new producto([
            'codigo' => $request->input('codigo'),
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
        ]);
        $producto->save();
        
        return redirect()->route('inventario');
    }
    function editproduct ($codigo){
        $producto = producto::find($codigo);
        return view('editproduct',['producto'=>$producto]);
    }

    function saveproduct (request $request){
        $codigo = $request->input('codigo');
        $nombre = $request->input('nombre');
        $precio = $request->input('precio');
        $producto = producto::find($codigo);
        $producto->nombre =  $nombre;
        $producto->precio = $precio;
        $producto->save();
        return redirect()->route('inventario');
    }
}
