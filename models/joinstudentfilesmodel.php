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
    public function getLugar(){             return $this->lugar;}    
    public function getDomicilio(){         return $this->domicilio;}    
    public function getTelefono(){          return $this->telefono;}    
    public function getCelular(){           return $this->celular;}    

    public function setIdFiles($idFile){            $this->idFiles = $idFile;}    
    public function setTiempoResidencia($tiempo){   $this->tiempoResidencia = $tiempo;}    
    public function setReligion($religion){         $this->religion = $religion;}    
    public function setOcupacion($ocupacion){       $this->ocupacion = $ocupacion;}    
    public function setMotivo($motivo){             $this->motivo = $motivo;}    
    public function setDescripcion($descripcion){   $this->descripcion = $descripcion;}    
    public function setIdAlumno($id){               $this->idAlumno = $id;}    
    public function setNombre($nombre){             $this->nombre = $nombre;}    
    public function setGenero($genero){             $this->genero = $genero;}    
    public function setLugar($lugar){               $this->lugar = $lugar;}    
    public function setDomicilio($domicilio){       $this->domicilio = $domicilio;}    
    public function setTelefono($telefono){         $this->telefono = $telefono;}    
    public function setCelular($celular){           $this->celular = $celular;}

    public function from($array){
        $this->idAlumno = $array['IdAlumno'];
        $this->nombre   = $array['NombreAlumno'];
        $this->fecha    = $array['FechaNacimiento'];
        $this->genero   = $array['Sexo'];
        $this->lugar    = $array['LugarNacimiento'];
        $this->domicilio    = $array['Domcilio'];
        $this->telefono     = $array['TelefonoCasa'];
        $this->celular      = $array['TelefonoCelular'];
        $this->idFiles      = $array['idExpediente'];
        $this->tiempoResidencia = $array['tiempoResidencia'];
        $this->religion         = $array['religion'];
        $this->ocupacion        = $array['ocupacion'];
        $this->motivo           = $array['motivo'];
        $this->descripcion      = $array['descripcion'];        
    }

    public function toArray(){
        $array = [];
        $array['IdAlumno']          = $this->idAlumno;
        $array['NombreAlumno']      = $this->nombre;
        $array['FechaNacimiento']   = $this->fecha;
        $array['Sexo']              = $this->genero;
        $array['LugarNacimiento']   = $this->lugar;
        $array['Domcilio']          = $this->domicilio;
        $array['TelefonoCasa']      = $this->telefono;
        $array['TelefonoCelular']   = $this->celular;
        $array['idExpediente']      = $this->idFiles;
        $array['tiempoResidencia']  = $this->tiempoResidencia;
        $array['religion']          = $this->religion;
        $array['ocupacion']         = $this->ocupacion;
        $array['motivo']            = $this->motivo;
        $array['descripcion']       = $this->descripcion; 
    }
    
    public function getAll($studentId){
        $items= [];
        try{
            $sql_query_string = 'SELECT tbl_expediente.idAlumno, 
            idExpediente, tiempoResidencia, religion, ocupacion, 
            motivo , descripcion, NombreAlumno, FechaNacimiento, 
            Sexo, LugarNacimiento, Domicilio, TelefonoCasa, 
            TelefonoCelular from tbl_expediente INNER JOIN 
            tbl_alumno WHERE tbl_alumno.idAlumno = 
            tbl_expediente.idAlumno and tbl_alumno.idAlumno = 
            :id ORDER BY idExpediente;';
            $query = $this->prepare($sql_query_string);
            $query->execute([
                'id'=>$studentId
            ]);

            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new JoinStudentFilesModel();
                $item->from($p) ;
                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            error_log("JoinStudentFilesModel::getAll -> " . $e);
            return false;
        }
    }

    public function getFirstJoinExpedienteAlumno($studentId){
        $items = getAll($studentId);
        if(!$items){
            return false;
        }
        return $items[0];
    }
}
?>
