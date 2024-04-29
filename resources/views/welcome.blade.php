@extends('layout.navbar')


@section('title','ventas')

@section('content')



<main class="principal">
    <section class="ventas">
        <h2>Pedidos</h2>
        <div class="pedidosN">   
            <ul id="listaPedidos"></ul> 
        </div>
    </section>
    <section style="text-align: center" class="items2">
        <h2>Productos</h2><div class="card">
        <div class="productosLista" id="productosLista">
            
                <table class="">
                    <thead class="encabezados">
                        <tr class="">
                            <th style="font-size: 20px" scope="col" class="items">Nombre</th>
                            <th style="font-size: 20px" scope="col" class="items">Cantidad</th>
                            <th style="font-size: 20px" scope="col" class="items">Precio</th>
                        </tr>
                    </thead>
                    <tbody id="productosTableBody">  <!-- Cuerpo de la tabla donde se añadirán las filas -->
                    </tbody>
                </table>
            </div>
        </section>

            </div>
            
    
            <section class="cobro" style="text-align: center" !important;>

                <h2>Total</h2>
                <div class="card">
                <h3 id="totalVenta" data-total="">0</h3>
        
                
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
                            <input type="hidden" name="id_venta" value="">
                            <select name="metodo_de_pago" class="form-select" aria-label="Método de Pago">                                <option value="efectivo">Efectivo</option>
                                <option value="tarjeta">Tarjeta</option>
                                <option value="transferencia">Transferencia</option>
                            </select>
                            <label for="cantidad_recibida">Cantidad recibida:</label>

                            <input type="number" class="form-control" id="cantidad_recibida" name="cantidad_recibida"
                            oninput="calcularCambio()">
                                         <p>Cambio: <span id="cambio">0</span></p>
        
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <button type="submit" form="formCobro" onclick="return Finalizar()" class="btn btn-danger">Finalizar venta</button>
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
                            <form id="formDiscount" action="/aplydiscount" method="POST">
                                @csrf
                                <select class="form-select" name="cliente_id" id="clienteSelect">
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-danger mt-3">Aplicar Descuento</button>
                                <input type="hidden" name="id_venta" value="">
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