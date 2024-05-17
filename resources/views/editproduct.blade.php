@extends('layout.navbar')


@section('title','Editor de productos')

@section('content')


<div class="card">  
               
    <div class="formularios" style="width: 350px">
    <form action="/saveproduct" method="POST">
        @csrf
        <input type="hidden" name="codigo" value="{{$producto->codigo}}">
        <label for="">Ingresa el nombre nuevo</label>
        <input class="form-control" type="text" name="nombre"  value="{{$producto->nombre}}" style="color: darkgray">
        <label for="">Ingresa el nuevo precio</label>
        <input class="form-control" name="precio" type="decimal" value="{{$producto->precio}}" style="color: darkgray">

        <button class="btn btn-primary" type="submit">Guardar cambios</button>
    </form>
</div>
</div>



@endsection