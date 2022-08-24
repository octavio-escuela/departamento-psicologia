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
        if ($this->arePOSTArgumentsValid()){
            $filesModel = new FilesModel();
            $filesModel->from($_POST);
            if($filesModel->save()){

            }else{
                $this->redirect('files',['error' =>
                ErrorMessages::ERROR_FILES_FAILED_INSERT_QUERY]);
            }
            $this->render();
        }else {
            $this->redirect('files',['error' => ErrorMessages::ERROR_FILES_MISSING_DATA] );
        }
    }

    private function arePOSTArgumentsValid(){
        //if ($this->existPOST(['alumnoId', ]))
    }
    
}
