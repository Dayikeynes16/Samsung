<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title> @yield('title')</title>
 </head>
 <body>
<nav class="navbar">
    <div class="container">
          <div class="boxOne">
            <li>
              <a type="button" class="btn btn-warning" href="/reportes">Reportes</a>
            </li>
            <li>
              <a type="button" class="btn btn-warning" href="/welcome">Ventas digitales</a>
            </li>
            <li>
              <a type="button" class="btn btn-warning" href="/barcode">Cobro con barras</a>
            </li>
            <li>
              <a type="button" class="btn btn-warning" href="/descuentos">Descuento</a>
            </li>
            <li>
              <a type="button" class="btn btn-warning" href="/inventario">inventario</a>
            </li>
          </div>
          
          <div class="boxTwo">
            <li class="nav-item">
              <a type="button" class="btn btn-danger" href="/login"> Cerrar Sesión</a>
            </li>
          </div>
  
    </div>
  </nav>

@yield('content')

</body>
</html>