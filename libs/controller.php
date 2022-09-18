<?php
/*controlador base por el cual todos los otros 
 controladores van a estar heredando*/
class Controller{
    public $view;
    public $model;
    function __construct(){
        $this->view = new View();
    }
    
    //se encarga de cargar el archivo del modelo de mi controlador asociado
    function loadModel($model){
        //busca el modelo por la url
        $url = 'models/'.$model.'model.php';
        //valida si existe el archivo modelo y lo inicializa
        if(file_exists($url)){
            require_once $url;
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

    function existPOST($params){
        foreach($params as $param){
            if(!isset($_POST[$param])){
                return false;
            }
        }
        return true;
    }

    function existGET($params){
        foreach($params as $param){
            if(!isset($_GET[$param])){
                return false;
            }
        }
        return true;
    }
    function getGet($name){
        return $_GET[$name];
    }
    function getPost($name){
        return $_POST[$name];
    }

    //esta funcion se utiliza cuando exista un error o un caso de exito me cargue los mensajes de exito o error en la vista
    function redirect($route, $mensajes){
        $data =[];
        $params = '';
        foreach($mensajes as $key => $mensaje){
            array_push($data, $key.'='.$mensaje);
        }
        $params =join('&', $data);
        if($params != ''){
            $params = '?'. $params; 
        }
        header('Location: '. constant('URL') . '/'. $route.$params);
    }
}