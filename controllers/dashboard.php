<?php

class Dashboard extends SessionController{


    function __construct(){
        parent::__construct();
        //este controlador sirve para centralizar nuestra aplicacion
        error_log("Dashboard:: construct -> inicio de Dashboard");
    }

    function render(){
        $this->view->render('dashboard/index',[
            'user'=>$this->user
        ]);
    }

}

?>