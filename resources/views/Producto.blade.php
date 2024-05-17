@extends('layout.navbar')


@section('title','Información del cliente')

@section('content')
<div class ="tiket">
<div class="card" style="display: flex !important;">
     <div class="formularios" style="padding: 20px">
        <h3>Venta id: {{$venta->id}}</h3>
        <h4>Fecha: {{$venta->fecha}}</h4> 
        <h4>Total {{$venta->total}}</h4>
        <h4>Cliente </h4>
    </div>

    <table>
        <thead class="encabezados">
            <th class="items" style="font-size: 20px" scope="col">
                Producto
            </th>
            <th class="items" style="font-size: 20px" scope="col">
                Kilos
            </th>
            
            <th class="items" style="font-size: 20px" scope="col">
                Subtotal
            </th>

        </thead>
        <tbody>
            @foreach ($venta->productoventas as $i)
                
            
            <tr class="items1" >
                <td class="items">
                    {{$i->producto->nombre}}
                </td>
                <td class="items">
                    {{$i->cantidad}}
                </td>
                
                <td class="items">
                    {{$i->subtotal}}
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
</div>



@endsection