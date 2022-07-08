<?php

class UserModel extends Model implements IModel{

    private $id;
    private $usuario;
    private $nombre;
    private $apellido_p;
    private $apellido_m;
    private $correo;
    private $contraseña;
    private $telefono;
    private $rol;

    public function __construct(){
        parent::__construct();

        $this->id="";
        $this->usuario="";
        $this->nombre="";
        $this->apellido_p="";
        $this->apellido_m="";
        $this->correo="";
        $this->contraseña="";
        $this->telefono="";
        $this->rol="";
    }

    
    // function updateBudget($budget, $iduser){
    //     try{
    //         $query = $this->db->connect()->prepare('UPDATE users SET budget = :val WHERE id = :id');
    //         $query->execute(['val' => $budget, 'id' => $iduser]);

    //         if($query->rowCount() > 0){
    //             return true;
    //         }else{
    //             return false;
    //         }
        
    //     }catch(PDOException $e){
    //         return NULL;
    //     }
    // }

    // function updateName($name, $iduser){
    //     try{
    //         $query = $this->db->connect()->prepare('UPDATE users SET name = :val WHERE id = :id');
    //         $query->execute(['val' => $name, 'id' => $iduser]);

    //         if($query->rowCount() > 0){
    //             return true;
    //         }else{
    //             return false;
    //         }
        
    //     }catch(PDOException $e){
    //         return NULL;
    //     }
    // }

    function updatePhoto($name, $iduser){
        try{
            $query = $this->db->connect()->prepare('UPDATE users SET photo = :val WHERE id = :id');
            $query->execute(['val' => $name, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updatePassword($new, $iduser){
        try{
            $hash = password_hash($new, PASSWORD_DEFAULT, ['cost' => 10]);
            $query = $this->db->connect()->prepare('UPDATE tbl_usuario SET password = :val WHERE id = :id');
            $query->execute(['val' => $hash, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function comparePasswords($current, $userid){
        try{
            $query = $this->db->connect()->prepare('SELECT id, password FROM tbl_usuario WHERE id = :id');
            $query->execute(['id' => $userid]);
            
            if($row = $query->fetch(PDO::FETCH_ASSOC)) return password_verify($current, $row['contraseña']);

            return NULL;
        }catch(PDOException $e){
            return NULL;
        }
    }


    
    public function save(){
        try{
            $query = $this->prepare('INSERT INTO tbl_usuario (usuario, nombre, apellido_p, apellido_m, correo, contrasena, telefono, id_rol) VALUES(:usuario, :nombre, :apellido_p, :apellido_m, :correo, :contrasena, :telefono, :rol)');
            $query->execute([
                'usuario'       =>  $this->usuario,
                'nombre'        =>  $this->nombre,
                'apellido_p'    =>  $this->apellido_p,
                'apellido_m'    =>  $this->apellido_m,
                'correo'        =>  $this->correo,
                'contrasena'    =>  $this->contraseña,
                'telefono'      =>  $this->telefono,
                'rol'           =>  $this->selectRole($this->rol)
                ]);
            return true;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }
    public function selectRole($rol){
        $query = $this->prepare('SELECT id FROM tbl_rol WHERE rol = :rol' );
        $query->execute(['rol' => $rol]);
        if($row = $query->fetch(PDO::FETCH_ASSOC)){
            return $row['id'];
        }
    } 

    public function getAll(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM tbl_usuario');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($p['id']);
                $item->setUsername($p['usuario']);
                $item->setName($p['nombre']);
                $item->setLastName($p['apellido_p']);
                $item->setMothLastName($p['apellido_m']);
                $item->setEmail($p['correo']);
                $item->setPassword($p['contrasena'], false);
                $item->setPhone($p['telefono']);
                $item->setRole($p['rol']);

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            echo $e;
        }
    }
    //? quisas pueda pasarle como parametro el id_rol para evitar sql injection
    //TODO: pasar la funcion a su pripio modelo

    
    public function getPsychologists(){
        $items = [];

        try{
            $query = $this->query('SELECT id, nombre, apellido_p, correo, telefono FROM tbl_usuario WHERE id_rol = 2');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($p['id']);
                $item->setName($p['nombre']);
                $item->setLastName($p['apellido_p']);
                $item->setEmail($p['correo']);
                $item->setPhone($p['telefono']);

                array_push($items, $item);
            }

            // foreach ($items as $item => $value){
            //     error_log($item.": ".$value);
            // }
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
            $query = $this->prepare('SELECT tbl_usuario.id, `usuario`,`nombre`, `apellido_p`, `apellido_m`, `correo`, `contrasena`, `telefono`, `rol` FROM tbl_usuario JOIN tbl_rol ON tbl_usuario.id_rol=tbl_rol.id where tbl_usuario.id=:id');
            $query->execute([ 'id' => $id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->id           = $user['id'] ?? 0;
            $this->usuario      = $user['usuario'] ?? '';
            $this->nombre       = $user['nombre'] ?? '';
            $this->apellido_p   = $user['apellido_p'] ?? '';
            $this->apellido_m   = $user['apellido_m'] ?? '';
            $this->correo       = $user['correo'] ?? '';
            $this->contraseña   = $user['contrasena'] ?? '';
            $this->telefono     = $user['telefono'] ?? '';
            $this->rol          = $user['rol'] ?? '';
            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM tbl_usuario WHERE id = :id');
            $query->execute([ 'id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE tbl_usuario SET usuario = :usuario, nombre = :nombre, apellido_p = :apellido_p, apellido_m = :apellido_m, correo = :correo, contraseña = :contrasena, telefono = :telefono WHERE id = :id');
            $query->execute([
                'id'            =>  $this->id,
                'usuario'       =>  $this->usuario,
                'nombre'        =>  $this->nombre,
                'apellido_p'    =>  $this->apellido_p,
                'apellido_m'    =>  $this->apellido_m,
                'correo'        =>  $this->correo,
                'contrasena'    =>  $this->contraseña,
                'telefono'      =>  $this->telefono
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function exists($usuario){
        try{
            $query = $this->prepare('SELECT usuario FROM tbl_usuario WHERE usuario = :usuario');
            $query->execute( ['usuario' => $usuario]);
            
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function from($array){

        $this->id           = $array['id'];
        $this->usuario      = $array['usuario'];
        $this->nombre       = $array['nombre'];
        $this->apellido_p   = $array['apellido_p'];
        $this->apellido_m   = $array['apellido_m'];
        $this->correo       = $array['correo'];
        $this->contraseña   = $array['contrasena'];
        $this->telefono     = $array['telefono'];

    }

    private function getHashedPassword($contraseña){
        return password_hash($contraseña, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    
    public function setId($id){                     $this->id = $id;}
    public function setUsername($usuario){          $this->usuario = $usuario;}
    public function setName($nombre){               $this->nombre = $nombre;}
    public function setLastName($apellido_p){       $this->apellido_p = $apellido_p;}
    public function setMothLastName($apellido_m){   $this->apellido_m = $apellido_m;}
    public function setEmail($correo){              $this->correo = $correo;}
    //FIXME: validar si se requiere el parametro de hash
    public function setPassword($contraseña, $hash = true){ 
        if($hash){
            $this->contraseña = $this->getHashedPassword($contraseña);
        }else{
            $this->contraseña = $contraseña;
        }
    }
    public function setPhone($telefono){            $this->telefono = $telefono;}
    public function setRole($rol){                  $this->rol = $rol;}
    


    public function getId(){                return  $this->id;}
    public function getUsername(){          return  $this->usuario;}
    public function getName(){              return  $this->nombre;}
    public function getLastName(){          return  $this->apellido_p;}
    public function getMothLastName(){      return  $this->apellido_m;}
    public function getEmail(){             return  $this->correo;}
    public function getPassword(){          return  $this->contraseña;}
    public function getPhone(){             return  $this->telefono;}
    public function getRole(){              return  $this->rol;}
}
