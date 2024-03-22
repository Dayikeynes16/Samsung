@extends('layout.navbar')


@section('title','ventas')

@section('content')

<main class="principal">
    <section class="ventas">
        <h2>Pedidos</h2>
        <div class="pedidosN">
            
                
                <ul><button id="" class="btn btn-primary btn-block" style="background-color: orange;">
                    <p>Pedido </p>
                </button></ul>
                    <form action="">
                        <input id="" class="consuta" type="hidden" value="">
                    </form>
            
            
        </div>
    </section>
    <section class="items">
        <h2>Productos</h2>
        <div class="tittle">
            <h4>Nombre</h4>
            <h4>Cantidad</h4>
            <h4>Precio</h4>
        </div>
        <div class="productosLista" id="productosLista">
           
        </div>
    
    </section>
    <section class="cobro">

        <form method="POST" action="/finalizar_venta/">
           @csrf
            <h1>Total: <h1 id="totalPrice"></h1> </h1>
            <label for="">Metodo de pago</label>
            <input id="inputCobro" type="hidden" name="id_venta" value="">
            <select name="metodo_de_pago" class="form-select" aria-label="Método de Pago">
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta</option>
                <option value="transferencia">Transferencia</option>
            
            </select>
            
            <div class="botoncobro">
            <button id="imprimirBtn" type="submit" class="btn btn-danger btn-block">Cobrar</button>
        </form>

       


        <form method="post" action="/eliminar_venta/">
            @csrf
            <input id="inputCancelar" type="hidden" name="id_venta" value="">
            <button  type="submit" class=" btn btn-primary" > Cancelar venta</button>
        </form>
    </div>

    <div class="discount" id="discountForm" >
        <form action="/descuento/" method="post">
            @csrf
            <label for="">Cliente</label>
                <select class="form-select" name="cliente" id="">
                    
                        <option value="">cliente</option>
                    
        </select>
        <input id="inputdescuento" type="hidden" name="id_venta" value="">
        <br>
        <button type="submit" class="btn btn-primary">Aplicar descuento</button>
    </div>
    
    
    </form>
    
    </section>
</main>

    
@endsection