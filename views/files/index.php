<!-- generador de expediente de alumno -->
<?php require_once ('views/template/sidebar.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Expediente de alumno</h1>
            </div>
        </div>
    </div>
<form action="<?php constant('URL') ?>/files/registerNewFile" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Expediente de alumno</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombre del alumno</label>
                                <input type="text" class="form-control" 
                                    id="nombre" name="nombre" 
                                    placeholder="Nombre del alumno">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Apellido paterno del alumno</label>
                                <input type="text" class="form-control" 
                                    id="apellido_paterno" name="apellidoPaterno"
                                    placeholder="Apellido paterno del alumno">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Apellido materno del alumno</label>
                                <input type="text" class="form-control" 
                                    id="apellido_materno" name="apellidoMaterno"
                                    placeholder="Apellido materno del alumno">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label>
                                <input type="date" class="form-control" 
                                    id="fecha_nacimiento" name="fecha"
                                    placeholder="Fecha de nacimiento">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Lugar de nacimiento</label>
                                <input type="text" class="form-control" 
                                    id="lugar_nacimiento" name="lugar" 
                                    placeholder="Lugar de nacimiento">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" class="form-control" 
                                    id="direccion" name="direccion" 
                                    placeholder="Dirección">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Teléfono de casa</label>
                                <input type="text" class="form-control" 
                                    id="telefonoCasa" name="telefonoCasa"
                                    placeholder="Teléfono de Casa">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Teléfono Celular</label>
                                <input type="text" class="form-control" 
                                    id="celular" name="telefonoCelular" 
                                    placeholder="Teléfono celular">
                            </div>
                        </div>
                    </div>
   </form>
