@extends('layout.navbar')


@section('title','descuentos')

@section('content')


<main class="clientes">
    <section class="">
        <div class="card">
            <ul>
               <h5>Dar de alta a un cliente nuevo</h5>
            </ul>
            <ul>
                <a class="btn btn-light" type="button" href="/editing">Nuevo</a>
            </ul>
        </div>
        <div class="card">
            <ul>
                <h5>Estado de cuentas</h5>
            </ul>
            <ul><a href="http://">Más Información</a></ul>
        </div>
    </section>

    <section class="">
        <div class="card">
        <table class="">
            <thead class="encabezados">
                <th class="items" style="font-size: 20px">Cliente</th>
                <th class="items" style="font-size: 20px">Nombre</th>
                <th class="items" style="font-size: 20px">Más Información</th>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr class="items1">
                    <td class="items">{{$cliente->nickname}}</td>
                    <td class="items">{{$cliente->name}}</td>
                    <td class="items"><a type="button" class="btn btn-warning" href="/infoclient/{{$cliente->id}}">info</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </section>
   
   
</main>

@endsection