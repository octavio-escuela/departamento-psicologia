<?php

class StudentModel extends Model implements IModel{

    private $id;
    private $nombre;
    private $fecha;
    private $genero;
    private $lugar;
    private $domicilio;
    private $telefono;
    private $celular;

    public function __construct(){
        parent::__construct();

        $this->id="";
        $this->nombre="";
        $this->fecha="";
        $this->genero="";
        $this->lugar="";
        $this->domicilio="";
        $this->telefono="";
        $this->celular="";
    }
    public function save(){
        try{
            $query = $this->prepare('INSERT INTO tbl_alumno (NombreAlumno, FechaNacimiento, Sexo, LugarNacimiento, Domicilio, TelefonoCasa, TelefonoCelular) VALUES(:nombre, :fecha, :genero, :lugar, :domicilio, :telefono, :celular)');
            $query->execute([
                'nombre'        =>  $this->nombre,
                'fecha'         =>  $this->fecha,
                'genero'        =>  $this->genero,
                'lugar'         =>  $this->lugar,
                'domicilio'     =>  $this->domicilio,
                'telefono'      =>  $this->telefono,
                'celular'       =>  $this->celular
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
            $query = $this->query('SELECT * FROM tbl_alumno');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new StudentModel();
                $item->setId($p['IdAlumno']);
                $item->setName($p['NombreAlumno']);
                $item->setFecha($p['FechaNacimiento']);
                $item->setGenero($p['Sexo']);
                $item->setLugar($p['LugarNacimiento']);
                $item->setDomicilio($p['Domicilio']);
                $item->setPhone($p['TelefonoCasa']);
                $item->setCelular($p['TelefonoCelular']);

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            echo $e;
        }
    }

    /**
     *  Gets an item
     */
    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM tbl_alumno WHERE id = :id');
            $query->execute([ 'id' => $id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->id           = $user['IdAlumno'];
            $this->nombre       = $user['NombreAlumno'];
            $this->fecha   = $user['FechaNacimiento'];
            $this->genero   = $user['Sexo'];
            $this->lugar       = $user['LugarNacimiento'];
            $this->domicilio   = $user['Domicilio'];
            $this->telefono     = $user['TelefonoCasa'];
            $this->celular          = $user['TelefonoCelular'];
            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM tbl_alumno WHERE id = :id');
            $query->execute([ 'id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE tbl_alumno SET NombreAlumno = :nombre, FechaNacimiento = :fecha, Sexo = :genero, LugarNacimiento = :lugar, Domicilio = :domicilio, TelefonoCasa = :telefono, TelefonoCelular = :celular WHERE IdAlumno = :id');
            $query->execute([
                'id'            =>  $this->id,
                'nombre'        =>  $this->nombre,
                'fecha'      =>  $this->fecha,
                'genero'    =>  $this->genero,
                'lugar'        =>  $this->lugar,    
                'domicilio'    =>  $this->domicilio,
                'telefono'    =>  $this->telefono, 
                'celular'       =>  $this->celular  
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    // public function exists($usuario){
    //     try{
    //         $query = $this->prepare('SELECT usuario FROM tbl_usuario WHERE usuario = :usuario');
    //         $query->execute( ['usuario' => $usuario]);
            
    //         if($query->rowCount() > 0){
    //             return true;
    //         }else{
    //             return false;
    //         }
    //     }catch(PDOException $e){
    //         echo $e;
    //         return false;
    //     }
    // }

    public function from($array){

        $this->id           = $array['IdAlumno'];
        $this->nombre       = $array['NombreAlumno'];
        $this->fecha        = $array['FechaNacimiento'];
        $this->genero       = $array['Sexo'];
        $this->lugar        = $array['LugarNacimiento'];
        $this->domicilio    = $array['Domicilio'];
        $this->telefono     = $array['TelefonoCasa'];
        $this->celular      = $array['TelefonoCelular'];
    }
        
    public function setId($id){                     $this->id = $id;}
    public function setName($nombre){               $this->nombre = $nombre;}
    public function setFecha($fecha){               $this->fecha = $fecha;}
    public function setGenero($genero){             $this->genero = $genero;}
    public function setLugar($lugar){               $this->lugar = $lugar;}
    public function setDomicilio($domicilio){       $this->domicilio = $domicilio; }
    public function setPhone($telefono){            $this->telefono = $telefono;}
    public function setCelular($celular){           $this->celular = $celular;}
    


    public function getId(){                return  $this->id;}
    public function getName(){              return  $this->nombre;}
    public function getFecha(){             return  $this->fecha;}
    public function getGenero(){            return  $this->genero;}
    public function getLugar(){             return  $this->lugar;}
    public function getDomicilio(){         return  $this->domicilio;}
    public function getPhone(){             return  $this->telefono;}
    public function getCelular(){           return  $this->celular;}

}