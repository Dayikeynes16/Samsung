<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="center">
      <h1>Ingresar</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" required>
          <span></span>
          <label>Usuario</label>
        </div>
        <div class="txt_field">
          <input type="password" required>
          <span></span>
          <label>Contraseña</label>
        </div>
        
       <a  type="button" class="btn btn-warning" href="/welcome">Ingresar</a>
        
      </form>
    </div>

  </body>
</html>
