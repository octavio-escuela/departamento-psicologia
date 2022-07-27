<?php

class Dashboard extends SessionController{
    private $user;

    function __construct(){
        parent::__construct();
        //este controlador sirve para centralizar nuestra aplicacion
        error_log("Dashboard:: construct -> inicio de Dashboard");
        $this->user = $this->getUserSessionData();
    }

    function render(){
        $this->view->render('dashboard/index',[
            'user'=>$this->user
        ]);
    }

}

?>