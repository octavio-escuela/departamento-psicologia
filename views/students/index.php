<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SASEB</title>
    <link rel="stylesheet" href="public/css/sidebar2.css">

    <!-- Bootstrap CSS v5.0.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
</head>

<body>
    <?php require_once 'views/admin/sidebar.php'; ?>
    <div class="dash-content">
        <h2 style="color:balck;" class="pt-5 pb-4">vista de alumnos</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <button id="btnNuevo" type="button" class="btn btn-primary" data-toggle="modal">
                        <i class="fa-solid fa-user-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <table id="example" class="table table-striped display nowrap" style="width:100%;">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Nombre</th>
                        <th>Fecha de nacimiento</th>
                        <th>Genero</th>
                        <th>Lugar de nacimiento</th>
                        <th>Domicilio</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>Tiger Nixon</td>
                        <td>2011/04/25</td>
                        <td>Hombre</td>
                        <td>Edinburgh</td>
                        <td>Newington 14 St Leonard's Street, Edimburgo EH8 9QW</td>
                        <td>131 662 5000</td>
                        <td>868 567 4356</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Tiger Nixon</td>
                        <td>2011/04/25</td>
                        <td>Mujer</td>
                        <td>Edinburgh</td>
                        <td>Newington 14 St Leonard's Street, Edimburgo EH8 9QW</td>
                        <td>131 662 5000</td>
                        <td>868 567 4356</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Acciones</th>
                        <th>Nombre</th>
                        <th>Fecha de nacimiento</th>
                        <th>Genero</th>
                        <th>Lugar de nacimiento</th>
                        <th>Domicilio</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- ========== Start Modal ========== -->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php $this->showMessages(); ?>
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close btn btn-transparent" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><i style="color: #fff" class="fa-solid fa-xmark"></i>
                    </span>
                </button>
            </div>
            <form id="formPersonas" action="<?php echo constant('URL');?>/students/newStudent" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-form-label">Fecha de nacimiento:</label>
                        <input type="date" name="fecha" class="form-control" id="fecha">
                    </div>
                    <div class="form-group">
                        <label for="genero" class="col-form-label">Genero: </label>
                        <select class="form-select" name="genero" aria-label="Default select example">
                            <option value="value1">Hombre</option>
                            <option value="value3">Mujer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lugar" class="col-form-label">Lugar de nacimiento:</label>
                        <input type="text" name="lugar" class="form-control" id="lugar">
                    </div>
                    <div class="form-group">
                        <label for="domicilio" class="col-form-label">Domicilio:</label>
                        <input type="text" name="domicilio" class="form-control" id="domicilio">
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="col-form-label">Telefono:</label>
                        <input type="tel" name="telefono" class="form-control" pattern="[0-9]{10}" id="telefono">
                    </div>
                    <div class="form-group">
                        <label for="celular" class="col-form-label">Celular:</label>
                        <input type="tel" name="celular" class="form-control" pattern="[0-9]{10}" id="celular">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-dark" id="btnGuardar" value="Siguiente" />
                    <!-- <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ========== End Modal ========== -->
    </div>
    </section>
    <!-- ========== script propio ========== -->
    <script src="public/js/studentModal.js"></script>
    <script src="public/js/script.js"></script>
    <!-- ========== script de bootstrap ========== -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- ========== script de datatable ========== -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            "columnDefs":[{
                "targets": 0,
                "data":null,
                "defaultContent":"<div class='text-center'><div class'btn-group'><button class='btn btn-primary btnEditar mx-2'><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger btnBorrar mx-2'><i class='fa-solid fa-trash'></i></button></div></div>"
            }],
            //Para cambiar el lenguaje a español
            "language":{
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infolmpty": "Mostrando registros del0alode un total dearegistros",
                "infofiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate":{
                    "sFirst": "Primero",
                    "sLast":"Ultimo",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing":"Procesando..."
            }
        });

        $("#btnNuevo").click(function(){
            //alert("Nuevo");
            $("#formPersonas").trigger("reset");
            $(".modal-header").css("background-color", "#0E4BF1");
            $(".modal-header").css("color", "#fff");
            $(".modal-title").text("Nuevo Estudiante");
            $("#modalCRUD").modal("show");
        });
        $("#formPersonas").submit(function(e){
            e.preventDefault();
            $
        });
    });
    </script>


</body>

</html>