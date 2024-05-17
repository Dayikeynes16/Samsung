@extends('layout.navbar')


@section('title','Información del cliente')

@section('content')

<main class="clientes">
    <section>
        <div class="infoclient">
            <div class="card">
                
                <h4>Nombre: {{$cliente->nombre}}</h4>
                <h4>Sobrenombre: {{$cliente->nickname}}</h4>
                <h4>Telefono: {{$cliente->telefono}}</h4>
                <h4>Dirección {{$cliente->direccion}}</h4>   
            </div>
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" style="text-align: center"  action="/savediscount">
                    @csrf
                    <input type="hidden" name="cliente" value="{{$cliente->id}}" id="">
                    <label for="">Seleccione el producto</label>
                    <select class="form-select" name="producto" id="">
                        @foreach ($productos as $producto)
                            <option value="{{$producto->codigo}}">{{$producto->nombre}}</option>
                        @endforeach
                    </select>
                    <label for="">Ingrese el precio</label>
                    <input name="precio" class="form-control" type="decimal">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </section>
   
<section>

    <div class="card" style="width: 800px !important">
        <table >
            <h3 style="padding-left:20px; color: midnightblue">Descuentos actuales</h3>

            <thead class="encabezados">
                <th class="items" style="font-size: 20px">Producto</th>
                <th class="items" style="font-size: 20px">Precio Original</th>
                <th class="items" style="font-size: 20px">Precio al cliente</th>
                <th class="items" style="font-size: 20px">Acciones</th>
            </thead>
            <tbody>
                @foreach ($precioespecial as $precioespecial)
                    <tr class="items1" >
                        <td class="items">
                            {{$precioespecial->producto->nombre}}
                        </td>
                        <td class="items">
                            {{$producto->precio}}
                        </td>
                        <td class="items">
                            {{$precioespecial->precio_especial}}
                        </td>
                        
                        <td style="display: flex;">
                           
                            <form  action="/deletediscount" method="POST">
                                @csrf
                                
                                <input type="hidden" name="cliente" value="{{$precioespecial->cliente_id}}" id="">
                                <input type="hidden" name="producto" value="{{$precioespecial->producto_id}}" id="">
                                <button onclick="return confirmar()" id="eliminar" type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>
    </div>
    <div class="card">
        <table>
            <h3 style="padding-left:20px; color: midnightblue">Ventas del cliente</h3>

            <thead class="encabezados">
                <th class="items" style="font-size: 20px">
                    Venta
                </th>
                <th class="items" style="font-size: 20px">
                    Fecha
                </th>
                <th class="items" style="font-size: 20px">
                    Total
                </th>
                <th class="items" style="font-size: 20px">
                    detalles
                </th>

            </thead>
            
                
            
            <tbody>
                @foreach ($ventas as $i)
                <tr class="items1">
                    <td class="items">
                        {{$i->id}}
    
                    </td>
                    <td class="items">
                        {{$i->fecha}}
                    </td>
                    <td class="items">
                        {{$i->total}}
                    </td>
                    <td class="items">
                       
                        <a type="button" class="btn btn-warning" href="/ventadetalles/{{$i->id}}">Información</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   

</section>

</main>




    



@endsection