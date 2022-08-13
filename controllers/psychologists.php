<?php

class Psychologists extends SessionController{
    private $user;
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        error_log('Student:: render -> carga la vista de psicologos');
        $this->view->errorMessage = '';
        $this->view->render('psychologists/index',[
            'user' => $this->user
        ]);
    }

    function newUser(){
        if($this->existPOST(['username','nombre','apellido_p','apellido_m','correo', 'password', 'telefono'])){

            $username = $this->getPost('username');
            $nombre = $this->getPost('nombre');
            $apellido_p = $this->getPost('apellido_p');
            $apellido_m = $this->getPost('apellido_m');
            $correo = $this->getPost('correo');
            $password = $this->getPost('password');
            $telefono = $this->getPost('telefono');
            
            error_log($username == ''|| empty($username) || $nombre == '' || empty($nombre) || $apellido_p == '' || empty($apellido_p) || $apellido_m == '' || empty($apellido_m) || $correo == '' || empty($correo) || $password == ''|| empty($password) || $telefono == '' || empty($telefono));

            if($username == ''|| empty($username) || $nombre == '' || empty($nombre) || $apellido_p == '' || empty($apellido_p) || $apellido_m == '' || empty($apellido_m) || $correo == '' || empty($correo) || $password == ''|| empty($password) || $telefono == '' || empty($telefono)){
                $this->redirect('psychologists',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }
            else{
                $user =new UserModel();
    
                $user -> setUsername($username);
                $user ->setName($nombre);
                $user ->setLastName($apellido_p);
                $user ->setMothLastName($apellido_m);
                $user ->setEmail($correo);
                $user ->setPassword($password);
                $user ->setPhone($telefono);
                $user ->setRole('tutor');
    
                if($user->exists($username)){
                    $this->redirect('psychologists',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS]);
                }else if($user->save()){
                    $this->redirect('psychologists',['success' => SuccessMessages::SUCCESS_SIGNUP_NEWUSER]);
                }else{
                    $this-> redirect('psychologists',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
                }
            }
        }else{
            $this-> redirect('psychologists',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
        }
    }
    // new expense UI
    function createPsychologistsTable(){
        $user = new UserModel(); 
        return $user->getPsychologists();
    } 

    function delete($params){
        error_log("psychologists::delete()");
        
        if($params === NULL) $this->redirect('psychologists', ['error' => ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS]);
        $id = $params[0];
        error_log("psychologists::delete() id = " . $id);
        $user = new UserModel();
        $res = $user->delete($id);

        if($res){
            $this->redirect('psychologists', ['success' => SuccessMessages::SUCCESS_PSYCHOLOGIST_DELETE]);
        }else{
            $this->redirect('psychologists', ['error' => ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS]);
        }
    }
    
    function formPsychologistById($params){

        if($params === NULL) $this->redirect('psychologists', ['error' => ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS]);
        $id = $params[0];
        error_log("formPsychologistById->". $id);
        $psicologo =new UserModel();
        $psicologo->getPsychologistById($id);
        error_log("formPsychologistById->". $psicologo->getUsername());
        if($psicologo) {
            $this->view->render('psychologists/editar',[
                'user' => $this->user,
                'psicologo' => $psicologo
            ]);
        }
        else {
            $this->redirect('psychologists', ['error' => ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS]);
        }
    }

    function updatePsychologist(){
        if($this->existPOST(['username','nombre','apellido_p','apellido_m','correo', 'password', 'telefono'])){
            $id = $this->getPost('id');
            $username = $this->getPost('username');
            $nombre = $this->getPost('nombre');
            $apellido_p = $this->getPost('apellido_p');
            $apellido_m = $this->getPost('apellido_m');
            $correo = $this->getPost('correo');
            $password = $this->getPost('password');
            $telefono = $this->getPost('telefono');
            
            error_log($username == ''|| empty($username) || $nombre == '' || empty($nombre) || $apellido_p == '' || empty($apellido_p) || $apellido_m == '' || empty($apellido_m) || $correo == '' || empty($correo) || $password == ''|| empty($password) || $telefono == '' || empty($telefono));
            if($id == '' || empty($id) || $username == ''|| empty($username) || $nombre == '' || empty($nombre) || $apellido_p == '' || empty($apellido_p) || $apellido_m == '' || empty($apellido_m) || $correo == '' || empty($correo) || $password == ''|| empty($password) || $telefono == '' || empty($telefono)){
                $this->redirect('psychologists',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }
            else{
                $user =new UserModel();
                $user->setId($id);
                $user -> setUsername($username);
                $user ->setName($nombre);
                $user ->setLastName($apellido_p);
                $user ->setMothLastName($apellido_m);
                $user ->setEmail($correo);
                $user ->setPassword($password);
                $user ->setPhone($telefono);

                if ($user->update()){ 
                    $this->redirect('psychologists',['success' => SuccessMessages::SUCCESS_SIGNUP_NEWUSER]);
                }else {
                    $this->redirect('psychologists',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
                }

            }
        }else{
            $this-> redirect('psychologists',['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
        }
    }
}
