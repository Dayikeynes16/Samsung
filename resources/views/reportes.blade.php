@extends('layout.navbar')


@section('title','reportes')

@section('content')

<main class="mainReport">
    <section class="">
        
        <div class="boxPapi">
            <div class="boxes">  <h3>Venta total:</h3> <h3>${{$total}}</h3> </div>
            <div class="boxes">  <h3>Venta con efectivo:</h3> <h3>{{$efectivo}}</h3></div>
            <div class="boxes">  <h3>Venta con tarjeta:</h3> <h3>{{$tarjeta}}</h3>   </div>
            <div class="boxes">  <h3>Venta con transferencia:</h3> <h3>{{$transferencias}}</h3> </div>
        </div>

    </section>
    <section class="sectionProductosPro">
     
           
        
        <div class="card" >
            <h2 style="text-align: center">Ventas del dia</h2>
            <div class="reports">

            <table>
                <thead class="encabezados">
                    <tr>
                        <th class="items" style="font-size: 20px" scope="col">
                        ID
                        </th class="items" style="font-size: 20px" scope="col">
                        <th>
                            Total
                        </th class="items" style="font-size: 20px" scope="col">
                        <th>
                            Metodo de pago
                        </th class="items" style="font-size: 20px" scope="col">
                        <th>
                            Fecha
                        </th class="items" style="font-size: 20px" scope="col">
                    </tr>
                </thead>
                
                <tbody>
                    

                            
                            @foreach ($ventas as $venta)
                        <tr class="items1"  scope="row">
                            <td class="items">
                                {{$venta->id}}
                            </td>
                            <td class="items">
                                {{$venta->total}}
                            </td>
                            <td class="items">
                                {{$venta->metodo_de_pago}}
                            </td>
                            <td class="items">
                                {{$venta->fecha}}
                            </td>
                        </tr>
                @endforeach
            

                </tbody>
         

            </table>
        </div>
                
          

        
     
            
         
        </div>
    </section>
 </main>


@endsection