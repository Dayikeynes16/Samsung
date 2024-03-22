@extends('layout.navbar')


@section('title','reportes')

@section('content')

<main class="mainReport">
    <section class="encabezado">
        
        <div class="boxPapi">
            <div class="boxes">  <h3>Venta total:</h3> <h3>$23567</h3> </div>
            <div class="boxes">  <h3>Venta con efectivo:</h3>  <h3></h3></div>
            <div class="boxes">  <h3>Venta con tarjeta:</h3>  <h3></h3> </div>
            <div class="boxes">  <h3>Venta con transferencia:</h3> <h3></h3> </div>
        </div>

    </section>
    <section class="sectionProductosPro">
        <div class="encabezadoProductos">
            <h2>Lista de Productos</h2>
        </div>
        <div class="listaProductosPro">
        
            
         
        </div>
    </section>
 </main>


@endsection