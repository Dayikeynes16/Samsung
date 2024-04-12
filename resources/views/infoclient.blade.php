@extends('layout.navbar')


@section('title','Información del cliente')

@section('content')

<main class="clientes">
    <section>
        <div class="infoclient">
            <div class="card">
                
                <h4>Nombre: {{$cliente->name}}</h4>
                <h4>Sobrenombre: {{$cliente->nickname}}</h4>
                <h4>Telefono: {{$cliente->telefono}}</h4>
                <h4>Dirección {{$cliente->direccion}}</h4>   
            </div>
            <div class="card">
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
                    <input name="precio" class="form-control" type="number">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        
    </section>
   
<section>

    <div class="card" style="width: 800px !important">
        <table >
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
                            <form action="">
                                @csrf
                                <input type="hidden" name="cliente" value="{{$precioespecial->cliente_id}}" id="">
                                <input type="hidden" name="producto" value="{{$precioespecial->producto_id}}" id="">
                                <button style="margin-right:10px " type="submit" class="btn btn-warning">Editar</button>
                            </form>
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
   

</section>

</main>




    



@endsection