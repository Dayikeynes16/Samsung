@extends('layout.navbar')


@section('title','Codigos de barras')

@section('content')

<main class="principal">
    <section class="ventas">
    
        <h2>Pedidos</h2>
        <div class="pedidosN">
            <form class="form-control" action="/addingbarcode" method="post">
                @csrf

                
                <select  class="form-select" name="producto" id="">
                
                    @foreach ($producto as $i)

                    <option value="{{$i->codigo}}"> {{$i->nombre}}</option>
                    
                    @endforeach
                   
              
                </select>
                <label>Introduzca el peso en kg </label>
                <input class="form-control" name ='peso' type="decimal">
                <br>
                <button class="btn btn-warning" type="submit">Enviar</button>
            </form>
<br>
            <form class="form-control" action="" method="post">
                @csrf
                <label for="codigo_barras">Código de Barras:</label>
                <input class="form-control" type="text" id="codigo_barras" name="codigo_barras" required, autofocus>
                <br>
                <button class="btn btn-warning" type="submit">Agregar Producto</button>
            </form>
            
        </div>
    </section>
    <section class="items">
        <h2>Productos</h2>
        <table class="table table-borderless">
             <thead>
                <tr>
                    <th scope="col">producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productoventa as $i)
                <tr>
                    <td>{{$i->producto->nombre}}</td>
                    <td>{{ $i->cantidad }}</td>
                    <td>${{ $i->subtotal }}</td>
                    <td> 
                        <form action="deletebarcode/{{$i->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>      
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        
    
    </section>
    <section class="cobro">

        <form method="POST" action="/finishbarcode">
           @csrf
            <h1>Total: ${{$venta->total}} </h1>
            <input  type="hidden" name="id_venta"  value="{{$venta->id_venta}}">
            <select name="metodo_de_pago" class="form-select" aria-label="Método de Pago">
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta</option>
                <option value="transferencia">Transferencia</option>
            </select>
            <div class="botoncobro">
            <button type="submit" class="btn btn-danger btn-block">Cobrar</button>
        </form>
    </div>

   

    
    </section>
</main>

@endsection