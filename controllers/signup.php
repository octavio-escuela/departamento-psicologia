<?php

class Signup extends SessionController{
    private $user;
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        $this->view->errorMessage = '';
        $this->view->render('psychologists/signup',[
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
}

?>