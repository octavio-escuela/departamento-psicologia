
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
          <h2>Registro</h2>
          <form action="<?php echo constant('URL');?>/signup/newUser" method="POST">
            <div class="caja_entrada">
              <input type="text" name="username" placeholder="Usuario" />
            </div>
            <div class="caja_entrada">
              <input type="text" name="nombre" placeholder="Nombre" />
            </div>
            <div class="caja_entrada">
              <input type="text" name="apellido_p" placeholder="Apellido Paterno" />
            </div>
            <div class="caja_entrada">
              <input type="text" name="apellido_m" placeholder="Apellido Materno" />
            </div>
            <div class="caja_entrada">
              <input type="text" name="correo" placeholder="Correo" />
            </div>
            <div class="caja_entrada">
              <input type="password" name="password" placeholder="Contraseña" />
            </div>
            <div class="caja_entrada">
              <input type="text" name="telefono" placeholder="Telefono" />
            </div>
            <div class="boton-style">
              <input type="submit" value="Siguiente" />
              <!-- enlace al controlador-->
            </div>
          </form>
          <span class="text-footer">¿Tienes una cuenta? <br>
            <a href="<?php echo constant('URL');?>">   Iniciar sesion</a>
          </span>
        </div>
      </div>
    </div>
</body>
</html>