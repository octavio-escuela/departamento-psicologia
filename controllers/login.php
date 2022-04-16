<?php

class Login extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        error_log('Login:: render -> carga el index de login');
        //trim elimina espacios adelate y atras de la url actual
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        //separa la url cuando encuentre "/" y crea un arreglo
        $url = explode('/', $actual_link);
        //this está disponible cuando un método es invocado dentro del contexto de un objeto.
        $this->view->errorMessage = '';
        $this->view->render('login/index');
        
    }

    function authenticate(){
        
        if( $this->existPOST(['username', 'password']) ){
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            //validate data
            if($username == '' || empty($username) || $password == '' || empty($password)){
                $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
                return;
            }
            // si el login es exitoso regresa solo el ID del usuario
            
            $user = $this->model->login($username, $password);

            if($user != NULL){
                // inicializa el proceso de las sesiones
   
                $this->initialize($user);
            }else{
                //error al registrar, que intente de nuevo
                //$this->errorAtLogin('Nombre de usuario y/o password incorrecto');
                $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA]);
                return;
            }
        }else{
            // error, cargar vista con errores
            //$this->errorAtLogin('Error al procesar solicitud');
            $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE]);
        }
    }

}

?>