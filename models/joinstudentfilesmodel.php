<?php
class JoinStudentFilesModel extends Model{

    private $idFiles;
    private $tiempoResidencia;
    private $religion;
    private $ocupacion;
    private $motivo;
    private $descripcion;
    private $idAlumno;

    private $nombre;
    private $fecha;
    private $genero;
    private $lugar;
    private $domicilio;
    private $telefono;
    private $celular;

    public function __construct(){
        parent::__construct();
    }

    public function getIdFiles(){           return $this->idFiles;}    
    public function getTiempoResidencia(){  return $this->tiempoResidencia;}    
    public function getReligion(){          return $this->religion;}    
    public function getOcupacion(){         return $this->ocupacion;}    
    public function getMotivo(){            return $this->motivo;}    
    public function getDescripcion(){       return $this->descripcion;}    
    public function getIdAlumno(){          return $this->idAlumno;}    
    public function getNombre(){            return $this->nombre;}    
    public function getGenero(){            return $this->genero;}    
    public function getIdAlumno(){          return $this->idAlumno;}    
    public function getIdAlumno(){          return $this->idAlumno;}    
    public function getIdAlumno(){          return $this->idAlumno;}    
    public function getIdAlumno(){          return $this->idAlumno;}    
}
?>