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
<form action="<?php echo constant('URL'); ?>/files/registerNewFile" method="POST">
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
                                <label for="">Atendió</label>
                                <input type="text" class="form-control" 
                                    id="atendio" name="atendio" 
                                    placeholder="Atendió">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" class="form-control" 
                                    id="fecha" name="fecha">
                            </div>
                        </div>
                    </div>
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
                                    id="fecha_nacimiento" name="fechaNacimiento"
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" 
                                    id="idAlumno" name="idAlumno">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Tiempo de residencia</label>
                                <input type="text" class="form-control" 
                                    id="tiempoResidencia" name="tiempoResidencia" 
                                    placeholder="Tiempo de residencia">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Religión</label>
                                <input type="text" class="form-control" 
                                    id="religion" name="religion" 
                                    placeholder="Religion">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Ocupación</label>
                                <input type="text" class="form-control" 
                                    id="ocupacion" name="ocupacion" 
                                    placeholder="Ocupación">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Motivo de consulta</label>
                                <input type="text" class="form-control" 
                                    id="motivoConsulta" name="motivoConsulta" 
                                    placeholder="Motivo de consulta">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input type="text" class="form-control" 
                                    id="descripcion" name="descripcion" 
                                    placeholder="Descripción">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" 
                                    id="idAlumno" name="idAlumno" 
                                    value="1">
                                    <!-- TODO conseguir el idAlumno -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" 
                                    id="idUsuario" name="idUsuario" 
                                    value="1">
                                    <!-- TODO conseguir el idUsuario -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="form-control" 
                                    value="Agregar expediente">
                            </div>
                        </div>
                    </div>

   </form>
