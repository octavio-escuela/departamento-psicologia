<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Registro</title>
</head>
<body>
  <br>
  <div class="container">
  <div class="row" style="background-color: aqua; border-radius: 15px;">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
    <h1>Registro</h1>
    <form action="conection.php" method="POST" autocomplete="on">
      <input type="text" name="usuario" placeholder="Usuario" required/> <br>
      <input type="text" name="nombre" placeholder="Nombre" required/><br>
      <input type="text" name="apellido" placeholder="Apellido" /><br>
      <input type="email" name="correo" placeholder="Correo" required/><br>
      <input type="password" name="contrasena" placeholder="Contraseña" required/><br>
      <input type="submit" name="submit" value="Siguiente"/><br>
    </form>
    <p>¿Tienes una cuenta? <a href="login.html">inicia sesión</a></p>
    </div>
    <div class="col-lg-4"></div>
  </div>
  </div>
</body>
</html>
