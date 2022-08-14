<?php

include_once 'models/joinstudentfilesmodel.php';
class Files extends SessionController{

    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render(){
        error_log('Files:: render -> carga la vista de files');
        $this->view->errorMessage = '';
        $this->view->render('files/index', [
            'user' => $this->user
        ]);
    }

    public function getFirstJoinExpedienteAlumno($studentId){
        $join = new JoinStudentFilesModel();
        $items = $join->getAll($studentId);
        if(!$items){
            return false;
        }
        return $items[0];
    }
    public function registerNewFile(){
        if ()
    }

    private function arePOSTArgumentsValid(){
        if ($this->existPOST(['alumnoId',  ]))
        
    }
    
}
