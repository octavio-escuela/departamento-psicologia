<?php

class Admin extends SessionController{


    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('admin/index');
    }

    function createCategory(){
        $this->view->render('admin/create-category');
    }
}

?>