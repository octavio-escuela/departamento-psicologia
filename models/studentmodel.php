<?php

class StudentModel extends Model implements IModel{

    private $id;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $fecha;
    private $genero;
    private $lugar;
    private $domicilio;
    private $telefonoCasa;
    private $telefonoCelular;

    public function __construct(){
        parent::__construct();

        $this->id = "";
        $this->nombre = "";
        $this->apellidoMaterno = "";
        $this->apellidoPaterno = "";
        $this->fecha = "";
        $this->genero = "";
        $this->lugar = "";
        $this->domicilio = "";
        $this->telefonoCasa = "";
        $this->telefonoCelular = "";
    }

    public function save(){
        try{
            $query = $this->prepare('INSERT INTO Alumno (Nombre, ApellidoPaterno, 
                ApellidoMaterno, FechaNacimiento, Sexo, LugarNacimiento, 
                Domicilio, TelefonoCasa, TelefonoCelular) VALUES(:nombre, 
                ,:apellidoPaterno, :apellidoMaterno, :fecha, :genero, 
                :lugar, :domicilio, :telefonoCasa, :telefonoCelular)');
            $query->execute([
                'nombre' => $this->nombre,
                'apellidoPaterno' => $this->apellidoPaterno,
                'apellidoMaterno' => $this->apellidoMaterno,
                'fecha' => $this->fecha,
                'genero' => $this->genero,
                'lugar' => $this->lugar,
                'domicilio' => $this->domicilio,
                'telefonoCasa' => $this->telefonoCasa,
                'telefonocelular' => $this->telefonoCelular
                ]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function getAll(){
        try{
            $query = $this->query('SELECT * FROM Alumno');
            $items = [];
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new StudentModel();
                $item->setId($p['IdAlumno']);
                $item->setName($p['Nombre']);
                $item->setApellidoMaterno($p['ApellidoMaterno']);
                $item->setApellidoPaterno($p['ApellidoPaterno']);
                $item->setFecha($p['FechaDeNacimiento']);
                $item->setGenero($p['Sexo']);
                $item->setLugar($p['LugarNacimiento']);
                $item->setDomicilio($p['Domicilio']);
                $item->setTelefonoCasa($p['TelefonoCasa']);
                $item->setTelefonoCelular($p['TelefonoCelular']);

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM Alumno WHERE IdAlumno = :Id');
            $query->execute([ 'Id' => $id ]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->setId($user['IdAlumno']); 
            $this->setName($user['NombreAlumno']);
            $this->setApellidoPaterno($user['ApellidoPaterno']);
            $this->setApellidoMaterno($user['ApellidoMaterno']);
            $this->setFecha($user['FechaDeNacimiento']); 
            $this->setGenero($user['Sexo']); 
            $this->setLugar($user['LugarNacimiento']); 
            $this->setDomicilio($user['Domicilio']); 
            $this->setTelefonoCasa($user['TelefonoCasa']); 
            $this->setTelefonoCelular($user['TelefonoCelular']); 
            return $this;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM Alumno WHERE IdAlumno = :id');
            $query->execute([ 'id' => $id ]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE Alumno SET Nombre = :nombre, ApellidoPaterno = :apellidoPaterno,
                ApellidoMaterno = :apellidoMaterno, FechaDeNacimiento = :fecha,
                Sexo = :genero, LugarNacimiento = :lugar, Domicilio = :domicilio, 
                TelefonoCasa = :telefonoCasa, TelefonoCelular = :telefonoCelular
                WHERE IdAlumno = :id');
            $query->execute([
                'id' => $this->id,
                'nombre' => $this->nombre,
                'apellidoMaterno' => $this->apellidoMaterno,
                'apellidoPaterno' => $this->apellidoPaterno,
                'fecha' => $this->fecha,
                'genero' => $this->genero,
                'lugar' => $this->lugar,    
                'domicilio' => $this->domicilio,
                'telefonoCelular' => $this->telefonoCelular, 
                'telefonoCasa' => $this->telefonoCasa  
                ]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

    public function from($array){
        $this->id = $array['IdAlumno'];
        $this->nombre = $array['Nombre'];
        $this->apellidoPaterno = $array['ApellidoPaterno'];
        $this->apellidoMaterno = $array['ApellidoMaterno'];
        $this->fecha = $array['FechaDeNacimiento'];
        $this->genero = $array['Sexo'];
        $this->lugar = $array['LugarNacimiento'];
        $this->domicilio = $array['Domicilio'];
        $this->telefonoCasa = $array['TelefonoCasa'];
        $this->telefonoCelular = $array['TelefonoCelular'];
    }
        
    public function setId($id){                     
        $this->id = $id;
    }
    public function setName($nombre){               
        $this->nombre = $nombre;
    }
    public function setApellidoMaterno($apellido)
    {
        $this->apellidoMaterno = $apellido;
    }
    public function setApellidoPaterno($apellido)
    {
        $this->apellidoPaterno = $apellido;
    }
    public function setFecha($fecha){               
        $this->fecha = $fecha;
    }
    public function setGenero($genero){             
        $this->genero = $genero;
    }
    public function setLugar($lugar){               
        $this->lugar = $lugar;
    }
    public function setDomicilio($domicilio){       
        $this->domicilio = $domicilio; 
    }
    public function setTelefonoCasa($numero){            
        $this->telefonoCasa = $numero;
    }
    public function setTelefonoCelular($numero){           
        $this->telefonoCelular = $numero;
    }

    public function getId(){                
        return  $this->id;
    }
    public function getName(){              
        return  $this->nombre;
    }
    public function getFecha(){             
        return  $this->fecha;
    }
    public function getGenero(){            
        return  $this->genero;
    }
    public function getLugar(){             
        return  $this->lugar;
    }
    public function getDomicilio(){         
        return  $this->domicilio;
    }
    public function getPhone(){             
        return  $this->telefonoCasa;
    }
    public function getCelular(){           
        return  $this->telefonoCelular;
    }
}
