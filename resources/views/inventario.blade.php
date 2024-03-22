@extends('layout.navbar')


@section('title','reportes')

@section('content')

<main class="principalinventario">
  <section class="inventario">
   
        <table class="table table-borderless">
            <thead>
              <tr>
                <th style="font-size: 20px" scope="col">Codigo</th>
                <th style="font-size: 20px" scope="col">Producto</th>
                <th style="font-size: 20px" scope="col">Precio</th>
                <th style="font-size: 20px" scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($producto as $i)
              <tr>
                <th scope="row">{{$i->codigo}}</th>
                <th>{{$i->nombre}}</th>
              
                <th>{{$i->precio}}</th>
                <th>
                  <form method="post" action="deleteitem/{{$i->codigo}}">
                  @csrf
                  @method('DELETE')
                    <button type="submit">Eliminar</button></form>
                </th>
              

              </tr>
          @endforeach
             
            </tbody>
          </table>

</section>
<section class="cobro">
    <div class="central">
      <h3>Agregar un producto nuevo</h3>
        <form method="POST" class="form-control" action="/addproduct">
          @csrf
            <label for="">Ingrese un Nombre</label>
            <input  class="form-control" @error('nombre') is-invalid @enderror type="text" name="nombre" id="">
             @error('nombre')
               <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            <label for="">Ponga un precio</label>
            <input @error('precio') is-invalid @enderror type="decimal" class="form-control" name="precio" id="">
            @error('precio')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit"  class="btn btn-warning" > Guardar </button>
        </form>
    </div>
</section>
</main>


@endsection