<?php

require_once 'models/usermodel.php';
class LoginModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        // insertar datos en la BD
        try{
            //$query = $this->db->connect()->prepare('SELECT * FROM tbl_usuario WHERE username = :username');
            $query = $this->prepare('SELECT * FROM tbl_usuario WHERE usuario = :usuario');
            $query->execute(['usuario' => $username]);
            error_log($username);
            if($query->rowCount() == 1){

                $item = $query->fetch(PDO::FETCH_ASSOC); 
                $user = new UserModel();
                $user->from($item);
                if(password_verify($password, $user->getPassword())){
                    
                    error_log("LoginModel::Login->success");
                    //return ['id' => $item['id'], 'username' => $item['username'], 'role' => $item['role']];
                    return $user;
                    //return $user->getId();
                }else{
                    error_log("LoginModel::Login->password no es igual");
                    return NULL;
                }
            }
        }catch(PDOException $e){
            error_log("LoginModel:: login->exception".$e);
            return NULL;
        }
    }

    

}

?>