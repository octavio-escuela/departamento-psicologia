<?php

class Psychologists extends SessionController{

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        error_log('Student:: render -> carga la vista de psicologos');
        $this->view->errorMessage = '';
        $this->view->render('psychologists/index');
    }
}