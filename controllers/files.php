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
        if ($this->existPOST(['atendio','fecha','nombre','apellidoPaterno',
        'apellidoMaterno','fechaNacimiento','lugar','direccion','telefonoCasa',
        'telefonoCelular', 'idAlumno','tiempoResidencia','religion','ocupacion',
        'motivoConsulta','descripcion','idUsuario']) && !empty($_POST['idAlumno'])
        && !empty($_POST['tiempoResidencia']) && !empty($_POST['religion']) 
        && !empty($_POST['ocupacion']) && !empty($_POST['motivoConsulta'])
        && !empty($_POST['descripcion']) && !empty($_POST['idUsuario'])){
            return true;
        }
        else {
            return false;
        }
    }
    
}
