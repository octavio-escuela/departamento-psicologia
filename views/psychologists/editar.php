<?php 
require_once ( 'views/template/sidebar.php' );
require_once('controllers/psychologists.php');

$data = $this->d['psicologo'];
$user = $this->d['user'];
?>
<p>
    <?php
      $this->showMessages();
    ?>
</p>
<div class='dash-content'>
    <div class='container mt-5'>
        <form action="<?php echo constant('URL');?>/psychologists/updatePsychologist" method="POST">
            <div class="mb-3">
                <input class="form-control" type="hidden" name="id" value="<?php echo($data->getId()); ?>" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="username" value="<?php echo($data->getName()); ?>" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="nombre" value="<?php echo($data->getName()); ?>" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="apellido_p" value="<?php echo($data->getLastName()); ?>" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="apellido_m" value="<?php echo($data->getName()); ?>" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="correo" value="<?php echo($data->getEmail()); ?>" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" name="password" value="<?php echo($data->getName()); ?>" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="telefono" value="<?php echo($data->getPhone()); ?>" />
            </div>
            <div>
                <button type='button' class='btn btn-secondary'>Cancelar</button>
                <button type='submit' class='btn btn-primary'>Guardar</button>
            </div>
        </form>
    </div>
</div>
</section>

