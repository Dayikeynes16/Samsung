@extends('layout.navbar')


@section('title','Codigos de barras')

@section('content')

<main class="principal">
    <section class="ventas">
    
        <h2>Pedidos</h2>
        <div class="card" style="text-align: initial;">
            <form class="form-control" action="/addingbarcode" method="post">
                @csrf

                <label for="">Seleccione</label>
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
           
            
        </div>
    </section>
    <section class="">
        <h2 style="text-align: center">Productos</h2>
        <div class="card" >
        <table class="">
             <thead class="encabezados">
                <tr >
                    <th style="font-size: 20px" scope="col" class="items">producto</th>
                    <th style="font-size: 20px" scope="col" class="items">Cantidad</th>
                    <th style="font-size: 20px" scope="col" class="items">Total</th>
                    <th style="font-size: 20px" scope="col" class="items">eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productoventa as $i)
                <tr  class="items1" >
                    <td class="items">{{$i->producto->nombre}}</td>
                    <td class="items">{{ $i->cantidad }} kg</td>
                    <td class="items">${{ $i->subtotal }}</td>
                    <td class="items"> 
                        <form action="deletebarcode/{{$i->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirmar()" type="submit">Eliminar</button>
                        </form>      
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div> 
    
    </section>
    <section class="cobro" style="text-align: center" !important;>

        <h2>Total</h2>
        <div class="card">
        <h3 id="totalVenta" data-total="{{ $venta->total }}">{{$venta->total}}</h3>

        
            <button type="button" class="btn btn-danger btn-block" data-bs-toggle="modal" data-bs-target="#modalCobro">
            Cobrar
          </button>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDescuento">
            Aplicar Descuento
        </button>
        

        </div>
        


        <div class="modal fade" id="modalCobro" tabindex="-1" aria-labelledby="modalCobroLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCobroLabel">Cobro</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="formCobro" method="POST" action="/finishbarcode">
                    @csrf
                    <input type="hidden" name="id_venta" value="{{$venta->id}}">
                    <select name="metodo_de_pago" class="form-select" aria-label="Método de Pago">
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta">Tarjeta</option>
                        <option value="Transferencia">Transferencia</option>
                    </select>
                    <label for="cantidad_recibida">Cantidad recibida:</label>
                    <input type="number" class="form-control" id="cantidad_recibida" name="cantidad_recibida"
                    oninput="calcularCambio()">
                                 <p>Cambio: <span id="cambio">0</span></p>

                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" onclick="return Finalizar()" form="formCobro" class="btn btn-danger">Finalizar venta</button>
                </div>
              </div>
            </div>
          </div>
          
    </div>

    <div class="modal fade" id="modalDescuento" tabindex="-1" aria-labelledby="modalDescuentoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDescuentoLabel">Aplicar Descuento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/aplydiscount" method="POST">
                        @csrf
                        <select class="form-select" name="cliente_id" id="clienteSelect">
                            @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-danger mt-3">Aplicar Descuento</button>
                        <input type="hidden" name="id_venta" value="{{$venta->id}}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    

   

    
    </section>
</main>

@endsection