@extends('layout.navbar')


@section('title','reportes')

@section('content')

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
    <br>
    <button class="btn btn-outline-success" >Guardar</button>
</form>

@endsection