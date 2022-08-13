<?php 
require_once ( 'views/template/sidebar.php' );
require_once('controllers/psychologists.php');

$data = new Psychologists();

$pysochologisTable=$data->createPsychologistsTable();
?>

<div class='dash-content'>
    <div class='container mt-5'>
        <form action="<?php echo constant('URL');?>/psychologists/newUser" method="POST">
            <div class="mb-3">
                <input class="form-control" type="text" name="username" placeholder="Usuario" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="nombre" placeholder="Nombre" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="apellido_p" placeholder="Apellido Paterno" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="apellido_m" placeholder="Apellido Materno" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="correo" placeholder="Correo" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" name="password" placeholder="Contraseña" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="telefono" placeholder="Telefono" />
            </div>
            <!-- <div class="boton-style">
                <input type="submit" value="Siguiente" />
                 //enlace al controlador
            </div> -->
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                <button type='submit' class='btn btn-primary'>Registrar</button>
            </div>
        </form>
    </div>
</div>
</section>
