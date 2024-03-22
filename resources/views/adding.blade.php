@extends('layout.navbar')


@section('title','reportes')

@section('content')

<main class="editing">
    <section class="adding">
        <h3>Modificar Productos</h3>
        <form class="form-control" action="">
            <label for="">modifique el codigo del producto</label>
            <input  class="form-control" value="code 1" type="text">
            <label for=""> Nombre</label>
            <input  class="form-control" type="text" value="item 2" name="" id="">
            <label for="">Cambie el precio</label>
            <input type="" class="form-control" value="$100" name="" id="">
            <a style="margin: 15px" class="btn btn-warning" href="/inventario">Guardar Cambios</a>
           
        </form>
    </section>
</main>


@endsection