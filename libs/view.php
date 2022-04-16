<?php
//este archivo va a servir para cargar todas las vista de cualquier cosa 
//que se tenga que mostrar ya sean errores o vistas
class View{
    function __construct(){

    }

    //esta funcion recibe el nombre de la vista que quiero cargar y datos
    //data servira para pasar informacion del controlador a la vista para que lo muestre 
    function render($nombre, $data =[]){
        error_log($nombre);
        $this->d =$data;

        $this->handleMessages();
        //se llama al archivo de la vista que quiero cargar
        require 'views/'.$nombre.'.php';
    }
    //esta funcion se encargara de mostrar los mensajes de error y exito
    private function handleMessages(){
        if(isset($_GET['success']) && isset($_GET['error'])){
            //error
        }else if(isset($_GET['success'])){
            //este se encarga de validar si existe el exito
            $this->handleSuccess();
        }else if (isset($_GET['error'])) {
            //este se encarga de validar si existe el error
            $this->handleError();
        }
    }
    
    private function handleError(){
        $hash = $_GET['error'];
        $error = new ErrorMessages();
        if($error->existsKey($hash)){
            $this->d['error']=$error->get($hash);
        }
    }
    private function handleSuccess(){
        $hash = $_GET['success'];
        $success = new SuccessMessages();
        if($success->existsKey($hash)){
            $this->d['success']=$success->get($hash);
        }
    }
    public function showMessages(){
        $this->showErrors();
        $this->showSuccess();
    }
    public function showErrors(){
        if(array_key_exists('error', $this->d)){
            echo '<div class="error">'.$this->d['error'].'</div>';
        }
    }
    public function showSuccess(){
        if(array_key_exists('success', $this->d)){
            echo '<div class="success">'.$this->d['success'].'</div>';
        }
    }
    
}