<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Creacion de expediente</title>
    <!-- Estilos css -->
    <link rel="stylesheet" href="public/css/login.css" />
	<link rel="stylesheet" href="public/css/files.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
    <p><?php
      $this->showMessages();
    ?>
    </p>
        <div class="row">
          <div class="col-lg-3"></div> 
          <div class="col-lg-6">
          	<div class="container bg-dark rounded">
          		<form action="">
            <h1 class="text-white">Creación de expediente</h1>
            	<div class="custom-control custom-control-inline">
                  <label for="atendio" class="text-white">Atendió</label>
                  <input type="text" id="atendio" class="form-control">
                  <label for="fecha" class="text-white">Fecha</label>
                  <input type="date" id="fecha" class="form-control">
            	</div>
            	<div class="custom-control custom-control-inline">
                  <label for="nombre" class="text-white">Nombre</label>
                  <input type="text" id="nombre" class="form-control">
                  <label for="fecha" class="text-white">Fecha de nacimiento</label>
                  <input type="date" id="fecha" class="form-control">
            	</div>
              <div class="form-group">
                   <select name="grupo" id="grupo" class="form-control">
                    <option value="1AMPG">1AMPG</option>
                  </select>
			            <select name="turno" id="turno" class="form-control">
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                  </select>
              </div>
             
          </form>
            </div>
            </div>
          <div class="col-lg-3"></div> 
        </div>
  </body>
<
