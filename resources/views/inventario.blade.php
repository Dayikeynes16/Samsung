@extends('layout.navbar')


@section('title','reportes')

@section('content')

<main class="principalinventario">
  <section class="inventario">
   <div class="card">
    <table class="">
      <thead class="encabezados">
        <tr >
          <th class="items" style="font-size: 20px" scope="col">Codigo</th>
          <th class="items" style="font-size: 20px" scope="col">Producto</th>
          <th class="items" style="font-size: 20px" scope="col">Precio</th>
          <th class="items" style="font-size: 20px" scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($producto as $i)
        <tr class="items1" >
          <th class="items" scope="row">{{$i->codigo}}</th>
          <th class="items">{{$i->nombre}}</th>
        
          <th class="items">{{$i->precio}}</th>
          <th class="items">
            <form method="post" action="deleteitem/{{$i->codigo}}">
            @csrf
            @method('DELETE')
              <button onclick="return confirmar()" class="btn btn-danger" type="submit">Eliminar</button></form>
          </th>
        

        </tr>
    @endforeach
       
      </tbody>
    </table>
   </div>
      
</section>

<section class="cobro">
  <div class="">
     <div class="card">
      <h3>Agregar un producto nuevo</h3>
        <form method="POST"  action="/addproduct">
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
  </div>
   
</section>
</main>


@endsection