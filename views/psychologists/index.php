<?php 
require_once ( 'views/template/sidebar.php' );
require_once('controllers/psychologists.php');

$data = new Psychologists();

$pysochologisTable=$data->createPsychologistsTable();

?>
<body>
<div class='dash-content'>
    <h2 style='color:balck;' class='pt-5 pb-4'>vista de psicologos</h2>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12'>
                <!-- Button trigger modal -->
                <button id='btnNuevo' type='button' class='btn btn-primary' data-bs-toggle='modal'
                    data-bs-target='#staticBackdrop'>
                    <i class='fa-solid fa-user-plus'></i>
                </button>
            </div>
        </div>
        <div class='row mt-5'>
            <div class='col-lg-12'>
                <div class='table-responsive'>
                    <table class='table table-striped table-hover' id="tabla">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="databody">
                            <?php foreach ($pysochologisTable as $pyschologist) {
                                
                             ?> 
                            <tr>
                                <td><?php echo $pyschologist->getId(); ?></td>
                                <td><?php echo $pyschologist->getName() ?></td>
                                <td><?php echo $pyschologist->getLastname(); ?></td>
                                <td><?php echo $pyschologist->getEmail(); ?></td>
                                <td><?php echo $pyschologist->getPhone(); ?></td>
                                <td>
                                    <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                        data-bs-target='#staticBackdrop'>
                                        <i class='fa-solid fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger' data-bs-toggle='modal'
                                        data-bs-target='#staticBackdrop'>
                                        <i class='fa-solid fa-trash-alt'></i>
                                    </button>
                                </td>
                            </tr>
                             <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class='container mt-5'>
        <!-- Modal -->
        <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1'
            aria-labelledby='staticBackdropLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='staticBackdropLabel'>Registrar nuevo Psicologo</h5>
                        <!-- <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button> -->
                    </div>
                    <div class='modal-body'>
                        <p><?php $this->showMessages();?></p>
                        <div class="fondo">
                            <div class="contenedor">
                                <div class="formulario">
                                    <form action="<?php echo constant('URL');?>/signup/newUser" method="POST">
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
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script src='public/js/script.js'></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/jquery.js"></script> 
    <script src="public/js/jquery.dataTables.min.js"></script> 
<script>
    // var tabla = document.querySelector('#tabla');
    // var dataTable = new DataTable(tabla, {
    //     "ajax": {
    //         "url": "http://localhost/departamento-psicologia/psychologists/createPsychologistsTable",
    //         "dataSrc": ""
    //         "type": "GET"
    //     },
    //     "columns": [
    //         { "data": "id" },
    //         { "data": "nombre" },
    //         { "data": "apellido_p" },
    //         { "data": "correo" },
    //         { "data": "telefono" }
    //     ]
    // });
    $(document).ready(function() {
        $('#tabla').DataTable({
            language : {
                url: "public/Datatable/es-ES.json"
            }
        });
    });
</script>

<!-- alertas -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="public/js/alert.js"></script>
