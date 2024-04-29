@extends('layout.navbar')


@section('title','reportes')

@section('content')
<div class="card">
    <div class="formularios">
        <form class="form-control" method="post" action="/savingclient">
            @csrf
            <label for="">Nombre</label>
            <input name="name" value="" class="form-control" type="text">
            <label  for="">Apodo</label>
            <input name="nickname" value="" class="form-control"type="text" name="" id="">
            <label  for="">Telefono</label>
            <input name="telefono" value="" class="form-control"type="text">
            <label for="">Dirección</label>
            <input name="direccion" value="" class="form-control"type="text" >
            
            <button class="btn btn-primary" >Guardar</button>
        </form>
    </div>
</div>


@endsection