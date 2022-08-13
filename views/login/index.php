<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>departamento psicologia</title>
    <!-- Estilos css -->
    <link rel="stylesheet" href="public/css/login.css" />
  </head>

  <body>
    <p><?php
      $this->showMessages();
    ?>
    </p>
    <div class="fondo">
      <div class="contenedor">
        <div class="formulario">
          <h2>Iniciar sesión</h2>
          <form action="<?php echo constant('URL');?>/login/authenticate" method="POST">
            <div class="caja_entrada">
              <input type="text" name="username" placeholder="Usuario" />
            </div>
            <div class="caja_entrada">
              <input type="password" name="password" placeholder="Contraseña" />
            </div>
            <div class="boton-style">
              <input type="submit" value="Siguiente" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>