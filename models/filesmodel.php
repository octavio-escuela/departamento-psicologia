<?php

class FilesModel extends Model implements IModel{

    private $idAlumno;
    private $tiempoResidencia;
    private $religion;
    private $ocupacion;
    private $motivoConsulta;
    private $descripcion;
    private $idUsuario;

    public function __construct(){

        parent::__construct();

        $idAlumno = "";
        $tiempoResidencia = "";
        $religion = "";
        $ocupacion = "";
        $motivoConsulta = "";
        $descripcion = "";
        $idUsuario = "";
    }

    public function save() { 
        try{
            $query = $this->prepare('INSERT INTO tbl_expediente 
                (tiempoResidencia, religion, ocupacion, motivo, descripcion, idAlumno, idUsuario)
                VALUES (:tiempo, :religion,:ocupacion,:motivo,:descr,:idalumno, :idUsuario)');
            $query->execute([
                'tiempo' => $this->tiempoResidencia,
                'religion' => $this->religion,
                'ocupacion' => $this->ocupacion,
                'motivo' => $this->motivoConsulta,
                'descr' => $this->descripcion,
                'idAlumno' => $this->idAlumno,
                'idUsuario' => $this->idUsuario
            ]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function getAll(){
        $items = [];
        try{
            $query = $this->query('SELECT * FROM tbl_expediente');
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new FilesModel();
                $item->setTiempoResidencia($p['tiempoResidencia']);
                $item->setReligion($p['religion']);
                $item->setOcupacion($p['ocupacion']);
                $item->setMotivo($p['motivo']);
                $item->setDescripcion($p['descripcion']);
                $item->setIdAlumno($p['idAlumno']);
                $item->setIdUsuario($p['idUsuario']);
                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            error_log($e);
        }
    }
    
    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM tbl_expediente WHERE idExpediente = :id');
            $query->exeute(['id' => $id]);
            $file = $query->fetch(PDO::FETCH_ASSOC);

            $this->id = $file['idExpediente'];
            $this->tiempoResidencia = $file['tiempoResidencia'];
            $this->getReligion = $file['religion'];
            $this->ocupacion = $file['ocupacion'];
            $this->motivo = $file['motivo'];
            $this->descripcion = $file['descripcion'];
            $this->idAlumno = $file['idAlumno'];
            $this->setIdUsuario($file['idUsuario']);

            return $this;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM tbl_expediente WHERE idExpediente = :id');
            $query->exceute(['id' => $id]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function update(){
        try{
            $query=$this->prepare('UPDATE tbl_expediente SET 
                tiempoResidencia = :tiempo, religion = :religion, ocupacion = :ocupacion, 
                motivo = :motivo, descripcion = :descr, idAlumno = :idAlumno,
                idUsuario = :idUsuario');
            $query->exceute([
                'tiempo' => $this->tiempoResidencia,
                'religion' => $this->religion,
                'ocupacion' => $this->ocupacion,
                'motivo' => $this->motivo,
                'descr' => $this->descripcion,
                'idAlumno' => $this->idAlumno,
                'idUsuario' => $this->idUsuario
            ]);
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function from($array){
        $this->tiempoResidencia = $array['tiempoResidencia'];
        $this->religion = $array['religion'];
        $this->ocupacion = $array['ocupacion'];
        $this->motivo = $array['motivacion'];
        $this->descripcion = $array['descripcion'];
        $this->idAlumno = $array['idAlumno']; 
        $this->setIdUsuario($array['idUsuario']);
    }

    public function setTiempoResidencia($tiempo){   
        $this->tiempoResidencia = $tiempo;
    }

    public function setReligion($religion){         
        $this->religion = $religion;
    }
    public function setOcupacion($ocupacion){       
        $this->ocupacion = $ocupacion;
    }
    public function setMotivo($motivo){             
        $this->motivo = $motivo;
    }
    public function setDescripcion($descripcion){   
        $this->descripcion = $descripcion;
    }
    public function setIdAlumno($idAlumno){         
        $this->idAlumno = $idAlumno;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getTiempoResidencia(){  
        return $this->tiempoResidencia;
    }
    public function getReligion(){          
        return $this->religion;
    }
    public function getOcupacion(){         
        return $this->ocupacion;
    }
    public function getMotivo(){            
        return $this->motivo;
    }
    public function getDescripcion(){       
        return $this->descripcion;
    }
    public function getIdAlumno(){          
        return $this->idAlumno;
    }
}
 
?>
