<?php

class Expenses extends SessionController{

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        error_log('Expenses:: render -> carga la vista de expenses');
        $this->view->errorMessage = '';
        $this->view->render('expenses/index');
    }
}