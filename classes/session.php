<?php
class Session{

    //! antes estaba como user
    private $sessionName = 'tutor';

    public function __construct(){
        //validar si la sesion ya existe
        //PHP_SESSION_NONE: si las sesiones están habilitadas, pero no existe ninguna.
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    //metodo para poner el usuario actual
    public function setCurrentUser($user){
        $_SESSION[$this->sessionName] =$user;
    }
    //metodo para obtener el usuario actual
    public function getCurrentUser(){
        return $_SESSION[$this->sessionName];
    }
    public function closeSession(){
        session_unset();
        session_destroy();
    }
    public function exists(){
        return isset($_SESSION[$this->sessionName]);
    }
}
?>