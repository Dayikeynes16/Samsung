@extends('layout.navbar')


@section('title','descuentos')

@section('content')


<main class="principal">
    <section class="ventas">
        <form action="" method="post">
        @csrf
            <label for="">Cliente</label>
            <select class="form-select" name="cliente" id="">
               
                    <option>Belinda</option>
         
            </select>
            <label for="">Escoja el producto</label>
            <select class="form-select" name="producto" id="">
          
            
                    <option >Producto 1</option>
                    <option >Producto 2</option>
                
            </select>
            <label for="">Ingrese el precio preferencial</label>
            <input name="precio" value="" class="form-control" type="number">
            <button type="submit" class="btn btn-outline-primary" >Aplicar</button>
        </form>
    </section>
    <section class="items">
        
        <table class="table table-borderless">
            <thead >
                <th>Cliente</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Telefono</th>
            </thead>
            <tbody>
                
                <tr>
                    <td>Belinda Monserrat Encino Castillo</td>
                    <td>Beli</td>
                    <td>Reforma, Chiapas</td>
                    <td>99223637281</td>
                </tr>
               
            </tbody>
        </table>

    </section>
    <section class="cobro">
        <p>Dar de alta a un cliente nuevo</p>
        <a class="btn btn-light" type="button" href="/editing">Nuevo</a>
    </section>
   
</main>

@endsection