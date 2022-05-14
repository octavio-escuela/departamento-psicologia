<?php

class Files extends SessionController{

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        error_log('Files:: render -> carga la vista de files');
        $this->view->errorMessage = '';
        $this->view->render('files/index');
    }
}