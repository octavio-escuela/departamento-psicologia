<?php

class FilesModel extends Model implements IModel{

    private $idExpediente;
    private $idAlumno;
    private $atendio;
    private $tiempoResidencia;
    private $religion;
    private $ocupacion;
    private $motivoConsulta;
    private $descripcionPaciente;
    private $fecha;
    private $idUsuario;

    public function __construct(){

        parent::__construct();

        $IdExpediente = "";
        $IdAlumno = "";
        $atendio = "";
        $tiempoResidencia = "";
        $religion = "";
        $ocupacion = "";
        $motivoConsulta = "";
        $descripcionPaciente = "";
        $fecha = "";
        $idUsuario = "";
    }

    public function save() { 
        try{
            $query = $this->prepare('INSERT INTO Expediente 
                (IdAlumno, Atendio, TiempoResidencia, Religion, Ocupacion,
                    MotivoConsulta, Descripcion, Fecha, IdUsuario)
                VALUES (:idAlumno, :atendio, :tiempo, :religion, :ocupacion,
                    :motivo, :descr, :fecha, :idUsuario)');
            $query->execute([
                'tiempo' => $this->tiempoResidencia,
                'atendio' => $this->atendio,
                'religion' => $this->religion,
                'ocupacion' => $this->ocupacion,
                'motivo' => $this->motivoConsulta,
                'descr' => $this->getDescripcion(),
                'idAlumno' => $this->idAlumno,
                'fecha' => $this->fecha,
                'idUsuario' => $this->idUsuario
            ]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function getAll(){
        try{
            $items = [];
            $query = $this->query('SELECT * FROM Expediente');
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new FilesModel();
                $item->setAtendio($p['Atendio']);
                $item->setTiempoResidencia($p['TiempoResidencia']);
                $item->setReligion($p['Religion']);
                $item->setOcupacion($p['Ocupacion']);
                $item->setMotivo($p['MotivoConsulta']);
                $item->setDescripcion($p['Descripcion']);
                $item->setIdAlumno($p['IdAlumno']);
                $item->setFecha($p['Fecha']);
                $item->setIdUsuario($p['IdUsuario']);
                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            error_log($e);
        }
    }
    
    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM Expediente WHERE 
                IdExpediente = :id');
            $query->execute(['id' => $id]);
            $file = $query->fetch(PDO::FETCH_ASSOC);

            $this->idExpediente = $file['IdExpediente'];
            $this->tiempoResidencia = $file['TiempoResidencia'];
            $this->religion = $file['Religion'];
            $this->ocupacion = $file['Ocupacion'];
            $this->motivoConsulta = $file['MotivoConsulta'];
            $this->setDescripcion($file['Descripcion']);
            $this->setFecha($file['Fecha']);
            $this->setAtendio($file['Atendio']);
            $this->idAlumno = $file['IdAlumno'];
            $this->setIdUsuario($file['IdUsuario']);

            return $this;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM Expediente WHERE IdExpediente = :id');
            $query->execute(['id' => $id]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function update(){
        try{
            $query=$this->prepare('UPDATE Expediente SET 
                TiempoResidencia = :tiempo, Religion = :religion, Ocupacion = :ocupacion, 
                MotivoConsulta = :motivo, Descripcion = :descr, IdAlumno = :idAlumno,
                IdUsuario = :idUsuario, Fecha = :fecha, Atendio = :atendio 
                WHERE IdExpediente = :id');
            $query->execute([
                'tiempo' => $this->tiempoResidencia,
                'religion' => $this->religion,
                'ocupacion' => $this->ocupacion,
                'motivo' => $this->motivoConsulta,
                'descr' => $this->getDescripcion(),
                'fecha' => $this->fecha,
                'atendio' => $this->atendio,
                'idAlumno' => $this->idAlumno,
                'idUsuario' => $this->idUsuario,
                'id' => $this->idExpediente
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
        $this->setMotivo( $array['motivoConsulta']);
        $this->setDescripcion($array['descripcionPaciente']);
        $this->setIdAlumno($array['idAlumno']); 
        $this->setFecha($array['fecha']);
        $this->setAtendio($array['atendio']);
        $this->setIdUsuario($array['idUsuario']);
    }

    public function setIdExpediente($idExpediente){
        $this->idExpediente = $idExpediente;
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
        $this->motivoConsulta = $motivo;
    }
    public function setDescripcion($descripcion){   
        $this->descripcionPaciente = $descripcion;
    }
    public function setIdAlumno($idAlumno){         
        $this->idAlumno = $idAlumno;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function setAtendio($atendio){
        $this->atendio = $atendio;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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
        return $this->motivoConsulta;
    }
    public function getDescripcion(){       
        return $this->descripcionPaciente;
    }
    public function getIdAlumno(){          
        return $this->idAlumno;
    }
}
 
?>
